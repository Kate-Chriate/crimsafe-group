jQuery(document).ready(($) => {

    // ── Mega menu ─────────────────────────────────────────────────────────────

    const overlay  = document.querySelector('.nav-overlay');
    const mainNav  = document.querySelector('.main-nav');
    const hamburger = document.querySelector('.nav-hamburger');

    function closeAllMenus() {
        document.querySelectorAll('.main-nav__list > .menu-item-has-children .sub-menu.is-open')
            .forEach(m => m.classList.remove('is-open'));
        document.querySelectorAll('.main-nav__list > .menu-item-has-children.sub-menu-toggle')
            .forEach(item => item.setAttribute('aria-expanded', 'false'));
        if (overlay) overlay.classList.remove('is-visible');
    }

    // Make entire top-level menu items with children act as toggles
    document.querySelectorAll('.main-nav__list > .menu-item-has-children').forEach(item => {
        const link    = item.querySelector(':scope > a');
        const subMenu = item.querySelector(':scope > .sub-menu');
        if (!link || !subMenu) return;

        item.classList.add('sub-menu-toggle');
        item.setAttribute('aria-expanded', 'false');
        link.insertAdjacentHTML('beforeend', '<svg width="12" height="8" viewBox="0 0 12 8" fill="none" aria-hidden="true"><path d="M1 1.5l5 5 5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>');

        link.addEventListener('click', e => e.preventDefault());

        // Inject close button into the mega menu panel
        subMenu.insertAdjacentHTML('beforeend', '<button class="mega-menu__close" aria-label="Close menu"><svg width="16" height="16" viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M2 2l12 12M14 2L2 14" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></button>');
        subMenu.querySelector('.mega-menu__close').addEventListener('click', e => {
            e.stopPropagation();
            closeAllMenus();
        });

        item.addEventListener('click', e => {
            if (e.target.closest('.sub-menu')) return;

            const isOpen = subMenu.classList.contains('is-open');

            // Close siblings
            document.querySelectorAll('.main-nav__list > .menu-item-has-children > .sub-menu.is-open').forEach(m => {
                m.classList.remove('is-open');
            });
            document.querySelectorAll('.main-nav__list > .menu-item-has-children.sub-menu-toggle').forEach(b => {
                b.setAttribute('aria-expanded', 'false');
            });

            if (!isOpen) {
                subMenu.classList.add('is-open');
                item.setAttribute('aria-expanded', 'true');
                if (overlay) overlay.classList.add('is-visible');
            } else {
                if (overlay) overlay.classList.remove('is-visible');
            }
        });
    });

    if (overlay) overlay.addEventListener('click', closeAllMenus);
    document.addEventListener('keydown', e => { if (e.key === 'Escape') closeAllMenus(); });

    // ── Mega menu image panel ─────────────────────────────────────────────────

    document.querySelectorAll('.main-nav__list > .menu-item-has-children').forEach(item => {
        const subMenu = item.querySelector(':scope > .sub-menu');
        if (!subMenu) return;

        const imageEl = subMenu.querySelector('.mega-menu__image');
        if (!imageEl) return;

        const defaultSrc = imageEl.src;

        function swapTo(src) {
            if (imageEl.getAttribute('src') === src) return;
            imageEl.classList.add('is-fading');
            setTimeout(() => {
                imageEl.src = src;
                imageEl.classList.remove('is-fading');
            }, 150);
        }

        subMenu.addEventListener('mouseover', e => {
            const li = e.target.closest('li[data-nav-image]');
            if (li) swapTo(li.dataset.navImage);
        });

        subMenu.addEventListener('mouseleave', () => swapTo(defaultSrc));
    });

    // ── Mobile hamburger ──────────────────────────────────────────────────────

    if (hamburger && mainNav) {
        hamburger.addEventListener('click', () => {
            const isOpen = mainNav.classList.contains('is-open');
            mainNav.classList.toggle('is-open');
            hamburger.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
            if (overlay) overlay.classList.toggle('is-visible', !isOpen);
        });
    }

    // ── ─────────────────────────────────────────────────────────────────────

    document.querySelectorAll('.logo-splide').forEach(el => {
        new Splide(el, {
            variableWidth: true,
            perPage: 7,
            gap: 100,
            type: 'loop',
            autoplay: true,
            pagination: false,
            arrows: false,
            breakpoints: {
                1400: { perPage: 5, gap: 70, },
                992: { perPage: 2, gap: 50, },
            },
        }).mount();
    });

    document.querySelectorAll('.gallery-splide').forEach(el => {
        new Splide(el, {
            perPage: 4,
            gap: 0,
            type: 'loop',
            
            pagination: false,
            arrows: true,
            breakpoints: {
                1200: { perPage: 2 },
            },
        }).mount();
    });

    document.querySelectorAll('.hero-gallery-splide').forEach(el => {
        new Splide(el, {
            perPage: 1,
            gap: 0,
            type: 'fade',
            pauseOnHover: false,
            pauseOnFocus: false,
            rewind: true,
            padigation: true,
            autoplay: true,
            pagination: false,
            arrows: false,
        }).mount();
    });

    document.querySelectorAll('.gallery-splide-block').forEach(el => {
        new Splide(el, {
            perPage: 1,
            gap: 10,
            type: 'loop',
            autoplay: true,
            pagination: true,
            arrows: false,
        }).mount();
    });

    

/*     document.querySelectorAll('.swiper-large').forEach(swiperEl => {
        const row = swiperEl.parentNode;
        const nextBtn = row.querySelector('.swiper-button-next');
        const dot = row.querySelector('.swiper-progress-dot');
        const track = row.querySelector('.swiper-progress-track');

        function updateDot(progress) {
            if (!dot || !track) return;
            const max = track.offsetWidth - dot.offsetWidth;
            dot.style.left = (progress * max) + 'px';
        }

        const swiper = new Swiper(swiperEl, {
            slidesPerView: 'auto',
            centeredSlides: true,
            spaceBetween: 30,
            effect: 'slide',
            loop: false,
            navigation: {
                nextEl: nextBtn,
                clickable: true
            },
            on: {
                init() { updateDot(0); },
                progress(s, progress) { updateDot(progress); },
            },
        });
    }); */
    



    document.querySelectorAll('.video-player').forEach(player => {
        const playBtn = player.querySelector('.play');
        const pauseBtn = player.querySelector('.video-pause-btn');
        const type = player.dataset.type;
        let vimeoPlayer = null;

        function startPlaying() {
            player.classList.add('is-playing');
        }

        function stopPlaying() {
            player.classList.remove('is-playing');
        }

        if (playBtn) {
            playBtn.addEventListener('click', () => {
                if (type === 'video') {
                    const video = player.querySelector('video');
                    if (video) { video.play(); startPlaying(); }
                } else if (type === 'vimeo') {
                    const iframe = player.querySelector('iframe');
                    if (!iframe) return;
                    if (typeof Vimeo !== 'undefined') {
                        if (!vimeoPlayer) vimeoPlayer = new Vimeo.Player(iframe);
                        vimeoPlayer.play();
                    } else {
                        const url = new URL(iframe.src);
                        url.searchParams.set('autoplay', '1');
                        iframe.src = url.toString();
                    }
                    startPlaying();
                }
            });
        }

        if (pauseBtn) {
            pauseBtn.addEventListener('click', () => {
                if (type === 'video') {
                    const video = player.querySelector('video');
                    if (video) { video.pause(); stopPlaying(); }
                } else if (type === 'vimeo') {
                    if (vimeoPlayer) vimeoPlayer.pause();
                    stopPlaying();
                }
            });
        }
    });

    const statSections = document.querySelectorAll('.count-stats-section');
    if (statSections.length) {
        function initCountObserver() {
            const pending = Array.from(statSections).filter(s => !s.dataset.counted);
            if (!pending.length) return null;
            const obs = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) return;
                    obs.unobserve(entry.target);
                    entry.target.dataset.counted = '1';
                    entry.target.querySelectorAll('.count-up').forEach(el => {
                        const raw = el.dataset.target.replace(/,/g, '');
                        const target = parseFloat(raw);
                        const decimals = raw.includes('.') ? (raw.split('.')[1] || '').length : 0;
                        const duration = 1800;
                        const delay = 300;

                        function tick(now) {
                            const elapsed = now - startTime - delay;
                            if (elapsed < 0) {
                                requestAnimationFrame(tick);
                                return;
                            }
                            const progress = Math.min(elapsed / duration, 1);
                            const eased = 1 - Math.pow(1 - progress, 3);
                            const value = eased * target;
                            el.textContent = decimals ? value.toFixed(decimals) : Math.round(value).toString();
                            if (progress < 1) requestAnimationFrame(tick);
                        }
                        const startTime = performance.now();
                        requestAnimationFrame(tick);
                    });
                });
            }, { threshold: 0.4, rootMargin: window.innerWidth >= 1200 ? '-240px' : '0px' });
            pending.forEach(s => obs.observe(s));
            return obs;
        }

        let countObserver = initCountObserver();

        let countResizeTimer;
        window.addEventListener('resize', () => {
            clearTimeout(countResizeTimer);
            countResizeTimer = setTimeout(() => {
                if (countObserver) countObserver.disconnect();
                countObserver = initCountObserver();
            }, 200);
        }, { passive: true });
    }

    /* const siteHeader = document.querySelector('.site-header');
    if (siteHeader) {
        function updateSiteHeader() {
            const dropdownOpen = !!document.querySelector('.sub-menu.is-open');
            siteHeader.classList.toggle('scrolled', window.scrollY >= 200 || dropdownOpen);
        }
        window.addEventListener('scroll', updateSiteHeader, { passive: true });
        const navObserver = new MutationObserver(updateSiteHeader);
        document.querySelectorAll('.sub-menu').forEach(m => {
            navObserver.observe(m, { attributes: true, attributeFilter: ['class'] });
        });
        updateSiteHeader();
    } */


});

