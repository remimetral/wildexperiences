
import { deeplink } from '../bundle';

export default class Login {
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
        this.id = 'login';
        this.page = null;
        this.$document = $(document);
    }

    /**
     * Initialize
     */
    init() {
        this.$document.on('page_change', this.check.bind(this));
        //window.addEventListener("reload", this.check);
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
      this.$document.title = this.page.find('.page_title').val();
    }

    animationIn() {
      //TweenMax.from(this.page.find('.bg_page'), 1, { alpha: 0, ease: Linear.easeOut });
      TweenMax.from(this.page.find('.content'), 1, { x: -100, alpha: 0, ease: Expo.easeOut, delay: deeplink.delayBeforeAnimIn });
      deeplink.reInitAnimation(deeplink.delayReInit);
    }

    animationOut() {
      TweenMax.to(this.page.find('.content'), 1, { x: -100, alpha: 0, ease: Expo.easeOut });
    }
}
