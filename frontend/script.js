gsap.to(".nav", {
    backgroundColor: "#0f0f0f",
    duration:0.5,
    height: "70px",
    scrollTrigger: {
      trigger: "#nav",
      scroller: "body",
      // markers:true,
      start: "top -10%",
      end: "top -11%",
      scrub: 1,
    },
  });
  gsap.to("#main", {
    backgroundColor: "rgba(0,0,0,0.75)",
    scrollTrigger: {
      trigger: "#main",
      scroller: "body",
      // markers: true,
      start: "top -20%",
      end: "top -70%",
      scrub: 2,
    },
  });
  