<template>
    <section class="relative overflow-hidden py-16">
        <div 
            class="absolute inset-0 bg-gradient-to-br from-[#2A1466]/40 via-[#1A1A2A]/40 to-[#003C78]/40"
            :style="{ transform: `translateY(${parallaxOffset}px)` }"
        ></div>
        <div class="container mx-auto px-4 py-12 relative z-10">
            <div class="max-w-3xl mx-auto text-center">
                <h2 
                    class="text-4xl md:text-6xl font-display font-bold mb-4 bg-gradient-to-r from-[#FF2CCC] via-[#7A1FFF] to-[#00E5FF] bg-clip-text text-transparent animate-fade-in"
                    :style="{ transform: `translateY(${parallaxOffset * 0.2}px)` }"
                >
                    Ласкаво просимо до ANIWHERE
                </h2>
                <p 
                    class="text-lg text-gray-300 mb-8 max-w-2xl mx-auto leading-relaxed animate-fade-in-delay"
                    :style="{ transform: `translateY(${parallaxOffset * 0.15}px)` }"
                >
                    Найбільша спільнота любителів аніме та манги. Обговорюй, ділися та відкривай нові тайтли разом з нами!
                </p>
                <div 
                    class="flex flex-wrap justify-center gap-3 animate-fade-in-delay-2"
                    :style="{ transform: `translateY(${parallaxOffset * 0.1}px)` }"
                >
                    <button class="px-6 py-2.5 bg-gradient-to-r from-[#FF2CCC] to-[#7A1FFF] rounded-lg font-semibold text-sm hover:scale-105 transition-all duration-300 shadow-lg shadow-[#FF2CCC]/30 hover:shadow-[#FF2CCC]/50">
                        Почати обговорення
                    </button>
                    <button class="px-6 py-2.5 bg-[#003C78]/50 border border-[#00E5FF]/50 rounded-lg font-semibold text-sm hover:bg-[#004A1A] hover:border-[#00E5FF] transition-all duration-300 hover:scale-105">
                        Дослідити форум
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
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
