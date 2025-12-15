<template>
    <section class="relative overflow-hidden py-8">
        <div class="container-grid py-2 relative z-10">
            <div>
                <h2 
                    class="text-4xl md:text-4xl font-display font-bold mb-4 text-white animate-fade-in"
                    :style="{ transform: `translateY(${parallaxOffset * 0.2}px)` }"
                >
                    Ласкаво просимо до ANIWHERE
                </h2>
            </div>
        </div>
        <!-- Sprite Slider Component -->
        <SpriteSlider />
    </section>
</template>

<script setup>
import SpriteSlider from './SpriteSlider.vue';

defineProps({
    parallaxOffset: {
        type: Number,
        default: 0
    }
});
</script>

<style scoped>
.font-display {
    font-family: 'Tektur', sans-serif;
}

@keyframes fade-in {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in {
    animation: fade-in 0.8s ease-out;
}

.animate-fade-in-delay {
    animation: fade-in 0.8s ease-out 0.2s both;
}

.animate-fade-in-delay-2 {
    animation: fade-in 0.8s ease-out 0.4s both;
}
</style>
