<div x-data="{
        introIsActive: true,
        showPanelsCovering: true,
        introContentVisible: true,
        progress: 0,

        animateProgress(targetDuration) {
            let startTime = null;
            const animationTick = (currentTime) => {
                if (!startTime) startTime = currentTime;
                const elapsedTime = currentTime - startTime;
                const currentProgress = Math.min(Math.floor((elapsedTime / targetDuration) * 100), 100);
                this.progress = currentProgress;

                if (elapsedTime < targetDuration) {
                    requestAnimationFrame(animationTick);
                } else {
                    this.progress = 100;
                }
            };
            requestAnimationFrame(animationTick);
        },

        initIntroSequence() {
            const svgAnimationDuration = 3000;

            const progressBarDuration = Math.max(svgAnimationDuration);

            const totalContentVisibilityTime = progressBarDuration + 300;
            const contentFadeOutStartTime = progressBarDuration;
            const panelSlideStartTime = contentFadeOutStartTime + 150;

            this.animateProgress(progressBarDuration);

            setTimeout(() => {
                this.introContentVisible = false;
            }, contentFadeOutStartTime);

            setTimeout(() => {
                this.showPanelsCovering = false;
            }, panelSlideStartTime);

            setTimeout(() => {
                this.introIsActive = false;
            }, 4000);
        }
    }"
    x-init="initIntroSequence()"
    class="fixed inset-0"
    :class="introIsActive ? 'z-[60]' : 'z-[-1] pointer-events-none'"
>
    <div
        x-show="introContentVisible"
        x-transition:leave="transition-opacity ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="absolute inset-0 z-[2] flex flex-col justify-center items-center pointer-events-none bg-gray-900"
    >
        @include('partials.svg')

        {{--
            <div class="w-48 md:w-64 mt-6">
                <div class="text-white text-xs sm:text-sm mb-1 text-center"></div>
                <div class="w-full bg-white h-0.5 sm:h-1 rounded-full overflow-hidden">
                    <div class="bg-[#4169e1] h-0.5 sm:h-1 rounded-full"
                        :style="`width: ${progress}%; transition: width 0.1s linear;`"
                    ></div>
                </div>
            </div>
        --}}
    </div>

    <div
        class="absolute left-0 top-0 w-full h-1/2 bg-gray-900 overflow-hidden transition-transform duration-1000 ease-[cubic-bezier(0.65,0,0.35,1)] z-[1]"
        :class="{
            '-translate-y-full': !showPanelsCovering,
            'translate-y-0': showPanelsCovering
        }"
    >
    </div>

    <div
        class="absolute left-0 bottom-0 w-full h-1/2 bg-gray-900 overflow-hidden transition-transform duration-1000 ease-[cubic-bezier(0.65,0,0.35,1)] z-[1]"
        :class="{
            'translate-y-full': !showPanelsCovering,
            'translate-y-0': showPanelsCovering
        }"
    >
    </div>
</div>
