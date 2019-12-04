
import Vue from 'vue';
import { deeplink } from '../bundle';
import { isMobile } from "../vendor/library";

export default class Activities {
    /**
     * @constructor
     */
    constructor() {
        this.variables();
        this.init();
    }

    /**
     * Global Variables
     */
    variables() {
        this.page = null;
        this.mobile = null;
        this.id = 'activities';
        this.panel = 'default';
        this.$window = $(window);
        this.$document = $(document);
        this.current = deeplink.$pages.eq(deeplink.current).find('.page_menu_id').val();
    }

    /**
     * Initialize
     */
    init() {
        this.$document.on("page_change", this.check.bind(this));
        if (this.id == this.current) {
            this.initEls();
            this.initEvents();
        }
    }

    /**
     * Initialize elements
     */
    initEls() {
        this.els = {
            cover: document.getElementsByClassName("cover"),
            winter: document.getElementsByClassName("winter"),
            summer: document.getElementsByClassName("summer")
        };
    }

    /**
     * Initialize events
     */
    initEvents() {
        this.$window.on("load resize", this.onWindowResize.bind(this));
        for (var cover of this.els.cover) {
            cover.addEventListener("click", this.onClickCover.bind(cover));
            //cover.addEventListener("mouseover", this.onOverCover.bind(cover));
            //cover.addEventListener("mouseout", this.onOutCover.bind(cover));
        }
        //this.els.winter[0].addEventListener("click", this.onClickWinter.bind(this));
        //this.els.summer[0].addEventListener("click", this.onClickSummer.bind(this));
    }

    onWindowResize() {
        if (this.$window.width() < 769) {
            TweenMax.to(this.els.winter[0], .1, { left: 0, top: "-50%", ease: Strong.easeOut });
            TweenMax.to(this.els.summer[0], .1, { right: 0, top: "50%", ease: Strong.easeOut });
        } else {
            TweenMax.to(this.els.winter[0], .1, { top: 0, left: "-50%", ease: Strong.easeOut });
            TweenMax.to(this.els.summer[0], .1, { top: 0, right: "-50%", ease: Strong.easeOut });
        }
    }

    /**
     * On hover cover
     */
    onOverCover() {
        TweenMax.to(this, .5, { css: { 'filter': 'grayscale(0)', '-webkit-filter': 'grayscale(0)' }, ease: Linear.easeNone });
    }

    /**
     * On out cover
     */
    onOutCover() {
        TweenMax.to(this, .5, { css: { 'filter': 'grayscale(1)', '-webkit-filter': 'grayscale(1)' }, ease: Linear.easeNone });
    }

    /**
     * On click cover
     */
    onClickCover() {
        var _this = this;
        if (this.dataset.type == 'winter') {
            if (this.panel == undefined) {
                this.panel = 'winter';
                this.parentElement.classList.add("zindex");
                if ($(window).width() < 769) {
                    TweenMax.to(this.parentElement, 1, { top: 0, ease: Expo.easeOut });
                } else {
                    TweenMax.to(this.parentElement, 1, { left: 0, ease: Expo.easeOut });
                }
            } else {
                this.panel = undefined;
                if ($(window).width() < 769) {
                    TweenMax.to(this.parentElement, 1, { top: '-50%', ease: Expo.easeOut, onComplete: function() {
                        _this.parentElement.classList.remove("zindex");
                    }});
                } else {
                    TweenMax.to(this.parentElement, 1, { left: '-50%', ease: Expo.easeOut, onComplete: function() {
                        _this.parentElement.classList.remove("zindex");
                    }});
                }
            }
        } else if (this.dataset.type == 'summer') {
            if( this.panel == undefined ) {
                this.panel = 'summer';
                this.parentElement.classList.add("zindex");
                if ($(window).width() < 769) {
                    TweenMax.to(this.parentElement, 1, { top: 0, ease: Expo.easeOut });
                } else {
                    TweenMax.to(this.parentElement, 1, { right: 0, ease: Expo.easeOut });
                }
            } else {
                this.panel = undefined;
                if ($(window).width() < 769) {
                    TweenMax.to(this.parentElement, 1, { top: '50%', ease: Expo.easeOut, onComplete: function() {
                        _this.parentElement.classList.remove("zindex");
                    }});
                } else {
                    TweenMax.to(this.parentElement, 1, { right: '-50%', ease: Expo.easeOut, onComplete: function() {
                        _this.parentElement.classList.remove("zindex");
                    }});
                }
            }
        }
    }

    /**
     * Check
     */
    check(e, current_page, type) {
        if( current_page.find('.page_id').val() != this.id ) return;

        this.page = current_page;

        switch(type) {
            case 'reinit':
                this.reInit();
                break;
            case 'animation_in':
                this.animationIn();
                break;
            case 'animation_out':
                this.animationOut();
                break;
        }
    }

    reInit() {

        //this.app = new Vue({el: '#app'});
        this.initEls();
        this.initEvents();

        this.$document.title = this.page.find('.page_title').val();
    }

    animationIn() { $('.carousel-test').carousel();
        //var _this = this;
        TweenMax.from(this.page.find('.logo'), 1, { scale: .8, alpha: 0, ease: Expo.easeOut, delay: 1.2 });
        TweenMax.from(this.page.find('.winter'), 1, { left: '-100%', ease: Expo.easeOut, delay: deeplink.delayBeforeAnimIn });
        TweenMax.from(this.page.find('.summer'), 1, { right: '-100%', ease: Expo.easeOut, delay: deeplink.delayBeforeAnimIn });
        deeplink.reInitAnimation(deeplink.delayReInit);
        //TweenMax.delayedCall(aDurationSlightlyShorterThanYourTween, someFunction)
        //setTimeout(function() { _this.onClickWinter() }, 2000);
    }

    animationOut() {
        this.panel = 'default'
        TweenMax.to(this.page.find('.logo'), 1, { scale: 1.2, alpha: 0, ease: Expo.easeOut, delay: .8 });
        TweenMax.to(this.page.find('.winter'), 1, { left: '-100%', ease: Expo.easeOut });
        TweenMax.to(this.page.find('.summer'), 1, { right: '-100%', ease: Expo.easeOut });
    }
}
