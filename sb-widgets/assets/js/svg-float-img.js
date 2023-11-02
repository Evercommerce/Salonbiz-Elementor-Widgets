jQuery(document).ready(function ($) {
  const respSvg = $('#float-bg-img svg');
  respSvg.each(function (i) {
    this.setAttribute('preserveAspectRatio', 'xMidYMid meet');
  });

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        //sets entry animation only for fade up animations
        entry.target.classList.add('shown');
        runInnerImg();
      }
    });
  }, { threshold: 0.5 });


  const animatedElements = document.querySelectorAll('.fade-in');
  animatedElements.forEach((el) => observer.observe(el));

  function runInnerImg() {
    let innerImgs = $('#float-bg-img svg g[class*="__animate"]');
    innerImgs.each((index) => {
      setTimeout(() => {
        $(innerImgs[ index ]).addClass('is-shown');
      }, 800 * (index + 1));
    });
  }
});
