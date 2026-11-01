/* Muh Fahmi portfolio — lightweight lanyard physics, no dependencies required. */
(function () {
  "use strict";

  const stage = document.getElementById("lanyard-stage");
  const assembly = document.getElementById("lanyard-assembly");
  const card = document.getElementById("lanyard-card");
  const svg = document.getElementById("lanyard-svg");
  const outer = document.getElementById("strap-outer");
  const center = document.getElementById("strap-center");
  const textPath = document.getElementById("strap-text-path");
  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)");

  if (stage && assembly && card && svg && outer && center && textPath) {
    const motion = {
      angle: reduceMotion.matches ? 0 : -0.24,
      velocity: 0,
      lean: 0,
      tilt: 0,
      dragging: false,
      pointerActive: false,
      pointerAngle: 0,
      pointerLean: 0,
      pointerTilt: 0,
      pointerId: null,
      startingX: 0,
      startingY: 0,
      startingAngle: 0,
      lastMoveX: 0,
      lastMoveTime: 0,
      lastFrame: 0,
      elapsed: 0
    };

    const clamp = (value, min, max) => Math.min(max, Math.max(min, value));

    function render() {
      const width = stage.clientWidth;
      const height = stage.clientHeight;
      if (!width || !height) return;

      // The metal clip and the strap share exactly the same endpoint.
      const anchorX = width / 2;
      const anchorY = -17;
      const cordLength = assembly.offsetTop + 2 - anchorY;
      const x = cordLength * Math.sin(motion.angle);
      const y = cordLength * (1 - Math.cos(motion.angle)) * 0.78;
      const endX = anchorX + x;
      const endY = assembly.offsetTop + y + 2;
      const springBend = clamp(motion.velocity * 12, -13, 13);

      // A gently curved SVG ribbon: unlike a rigid straight line, its shape
      // reacts to the card's momentum and follows its metal attachment point.
      const ctrlOneX = anchorX + x * 0.18 + springBend * 0.1;
      const ctrlOneY = anchorY + cordLength * 0.32;
      const ctrlTwoX = endX - x * 0.19 - springBend;
      const ctrlTwoY = endY - cordLength * 0.34;
      const path = [
        "M", anchorX.toFixed(2), anchorY.toFixed(2),
        "C", ctrlOneX.toFixed(2), ctrlOneY.toFixed(2),
        ctrlTwoX.toFixed(2), ctrlTwoY.toFixed(2),
        endX.toFixed(2), endY.toFixed(2)
      ].join(" ");

      svg.setAttribute("viewBox", "0 0 " + width + " " + height);
      outer.setAttribute("d", path);
      center.setAttribute("d", path);
      textPath.setAttribute("d", path);

      // Pendulum rotation + small 3D twists, so the badge feels suspended.
      assembly.style.transform =
        "translateX(-50%) translate(" + x.toFixed(2) + "px, " + y.toFixed(2) + "px) " +
        "rotateZ(" + (motion.angle * 57.2958).toFixed(2) + "deg) " +
        "rotateY(" + motion.lean.toFixed(2) + "deg) " +
        "rotateX(" + motion.tilt.toFixed(2) + "deg)";
    }

    function frame(now) {
      if (!motion.lastFrame) motion.lastFrame = now;
      const dt = clamp((now - motion.lastFrame) / 1000, 0, .035);
      motion.lastFrame = now;
      motion.elapsed += dt;

      if (!motion.dragging && !reduceMotion.matches) {
        // On mouse hover the pendulum seeks the cursor with spring inertia.
        // Once the cursor leaves, gravity takes over and it swings home.
        const target = motion.pointerActive ? motion.pointerAngle : 0;
        const stiffness = motion.pointerActive ? 10.5 : 4.65;
        const damping = motion.pointerActive ? 2.1 : 1.06;
        const gentleAirflow = motion.pointerActive ? 0 : .075 * Math.sin(motion.elapsed * 1.25);
        const acceleration = -stiffness * Math.sin(motion.angle - target) - damping * motion.velocity + gentleAirflow;
        motion.velocity = clamp(motion.velocity + acceleration * dt, -2.4, 2.4);
        motion.angle = clamp(motion.angle + motion.velocity * dt, -.73, .73);

        // Separate 3D yaw/pitch springs make the card face point toward
        // the cursor instead of merely sliding left or right.
        const factor = 1 - Math.exp(-6.5 * dt);
        motion.lean += ((motion.pointerActive ? motion.pointerLean : 0) - motion.lean) * factor;
        motion.tilt += ((motion.pointerActive ? motion.pointerTilt : 0) - motion.tilt) * factor;
      }

      render();
      window.requestAnimationFrame(frame);
    }

    function startDrag(event) {
      if (event.button !== undefined && event.button !== 0) return;
      motion.dragging = true;
      motion.pointerActive = false;
      stage.classList.remove("is-pointer-following");
      motion.pointerId = event.pointerId;
      motion.startingX = event.clientX;
      motion.startingY = event.clientY;
      motion.startingAngle = motion.angle;
      motion.lastMoveX = event.clientX;
      motion.lastMoveTime = performance.now();
      motion.velocity = 0;
      assembly.classList.add("is-dragging");
      if (card.setPointerCapture) card.setPointerCapture(event.pointerId);
      event.preventDefault();
    }

    function drag(event) {
      if (!motion.dragging || motion.pointerId !== event.pointerId) return;
      const dragX = event.clientX - motion.startingX;
      const dragY = event.clientY - motion.startingY;
      const nextAngle = clamp(motion.startingAngle + dragX / 220, -.68, .68);
      const now = performance.now();
      const dt = Math.max((now - motion.lastMoveTime) / 1000, .008);
      motion.velocity = clamp((nextAngle - motion.angle) / dt, -2.4, 2.4);
      motion.angle = nextAngle;
      motion.lean = clamp(dragX * .14, -26, 26);
      motion.tilt = clamp(-dragY * .11, -18, 18);
      motion.lastMoveX = event.clientX;
      motion.lastMoveTime = now;
      if (reduceMotion.matches) render();
      event.preventDefault();
    }

    function stopDrag(event) {
      if (!motion.dragging || (event && event.pointerId !== motion.pointerId)) return;
      motion.dragging = false;
      motion.pointerId = null;
      assembly.classList.remove("is-dragging");
      if (reduceMotion.matches) {
        motion.lean = 0;
        motion.tilt = 0;
        render();
      }
    }

    function followMouse(event) {
      if (motion.dragging || reduceMotion.matches || event.pointerType !== "mouse") return;
      const bounds = stage.getBoundingClientRect();
      const normalizedX = clamp((event.clientX - bounds.left - bounds.width / 2) / (bounds.width / 2), -1, 1);
      const normalizedY = clamp((event.clientY - bounds.top - bounds.height / 2) / (bounds.height / 2), -1, 1);

      motion.pointerActive = true;
      motion.pointerAngle = normalizedX * .39;
      motion.pointerLean = normalizedX * 24;
      motion.pointerTilt = -normalizedY * 13;
      stage.classList.add("is-pointer-following");
      card.style.setProperty("--glare-x", ((normalizedX + 1) * 50).toFixed(1) + "%");
      card.style.setProperty("--glare-y", ((normalizedY + 1) * 50).toFixed(1) + "%");
    }

    function releaseMouse() {
      motion.pointerActive = false;
      stage.classList.remove("is-pointer-following");
    }

    stage.addEventListener("pointermove", followMouse, { passive: true });
    stage.addEventListener("pointerleave", releaseMouse);
    window.addEventListener("blur", releaseMouse);
    card.addEventListener("pointerdown", startDrag);
    card.addEventListener("pointermove", drag);
    card.addEventListener("pointerup", stopDrag);
    card.addEventListener("pointercancel", stopDrag);
    card.addEventListener("lostpointercapture", stopDrag);
    card.addEventListener("keydown", function (event) {
      if (event.key === "ArrowLeft" || event.key === "ArrowRight") {
        motion.angle = clamp(motion.angle + (event.key === "ArrowLeft" ? -.12 : .12), -.68, .68);
        motion.velocity = 0;
        render();
        event.preventDefault();
      } else if (event.key === "Home") {
        motion.angle = 0;
        motion.velocity = 0;
        render();
        event.preventDefault();
      }
    });
    window.addEventListener("resize", render, { passive: true });
    render();
    if (!reduceMotion.matches) window.requestAnimationFrame(frame);
  }

  const toggle = document.getElementById("nav-toggle");
  const nav = document.getElementById("nav-links");
  if (toggle && nav) {
    const closeNav = function () {
      toggle.setAttribute("aria-expanded", "false");
      toggle.setAttribute("aria-label", "Buka menu navigasi");
      nav.classList.remove("is-open");
    };
    toggle.addEventListener("click", function () {
      const isOpen = nav.classList.toggle("is-open");
      toggle.setAttribute("aria-expanded", String(isOpen));
      toggle.setAttribute("aria-label", isOpen ? "Tutup menu navigasi" : "Buka menu navigasi");
    });
    nav.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", closeNav);
    });
    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape") closeNav();
    });
    document.addEventListener("click", function (event) {
      if (!nav.contains(event.target) && !toggle.contains(event.target)) closeNav();
    });
  }

  // Scroll reveal is progressive enhancement: show everything when unsupported.
  const reveals = document.querySelectorAll("[data-reveal]");
  if (reduceMotion.matches || !("IntersectionObserver" in window)) {
    reveals.forEach(function (element) { element.classList.add("is-visible"); });
  } else {
    const revealObserver = new IntersectionObserver(function (entries, observer) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: .08, rootMargin: "0px 0px -25px 0px" });
    reveals.forEach(function (element) { revealObserver.observe(element); });
  }

  const sections = Array.from(document.querySelectorAll("main section[id]"));
  const navLinks = Array.from(document.querySelectorAll(".nav-links a"));
  if ("IntersectionObserver" in window && sections.length) {
    const currentSectionObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          navLinks.forEach(function (link) {
            link.classList.toggle("active", link.hash === "#" + entry.target.id);
          });
        }
      });
    }, { rootMargin: "-25% 0px -55% 0px", threshold: 0 });
    sections.forEach(function (section) { currentSectionObserver.observe(section); });
  }
}());
