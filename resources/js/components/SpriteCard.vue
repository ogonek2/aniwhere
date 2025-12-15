<template>
    <div 
        class="flex-shrink-0 w-50 cursor-pointer group relative"
        @click="goToSprite"
    >
        <!-- Main Card -->
        <div class="relative rounded-xl overflow-hidden transition-all duration-500 hover:z-10">
            <!-- Animated Border Glow -->
            <div class="absolute inset-0 rounded-xl bg-gradient-to-r from-[#FF2CCC] via-[#7A1FFF] to-[#00E5FF] opacity-0 group-hover:opacity-100 blur-sm transition-opacity duration-500 animate-pulse"></div>
            
            <!-- Card Content -->
            <div class="relative bg-[#1A1A1A]/80 backdrop-blur-md border-2 border-[#2A1A4A]/50 group-hover:border-[#7A1FFF] rounded-xl overflow-hidden transition-all duration-500">
                <!-- Image Container with Scan Lines Effect -->
                <div class="aspect-[2/3] relative overflow-hidden">
                    <img 
                        :src="sprite.image" 
                        :alt="sprite.title"
                        class="w-full h-full object-cover group-hover:scale-125 transition-transform duration-700"
                    />
                    
                    <!-- Scan Lines Overlay -->
                    <div class="absolute inset-0 bg-[linear-gradient(transparent_50%,rgba(0,229,255,0.03)_50%)] bg-[length:100%_4px] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <!-- Glitch Effect Overlay -->
                    <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#FF2CCC]/20 via-transparent to-[#00E5FF]/20 animate-glitch"></div>
                    </div>
                    
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-[#1A1A1A] via-transparent to-transparent opacity-60 group-hover:opacity-80 transition-opacity duration-300"></div>
                    
                    <!-- Shine Effect -->
                    <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent opacity-0 group-hover:opacity-100 group-hover:animate-shine transform -skew-x-12"></div>
                    
                    <!-- Hover Info Overlay -->
                    <div class="absolute inset-0 bg-[#1A1A1A]/90 backdrop-blur-sm opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <div class="text-center px-3">
                            <div class="w-12 h-12 mx-auto mb-2 rounded-full bg-gradient-to-r from-[#FF2CCC] to-[#7A1FFF] flex items-center justify-center animate-pulse">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <p class="text-xs font-medium text-[#00E5FF]">Обговорити</p>
                        </div>
                    </div>
                </div>
                
                <!-- Content Section -->
                <div class="p-3 bg-gradient-to-b from-[#1A1A1A]/90 to-[#1A1A1A] border-t border-[#2A1A4A]/30">
                    <!-- Title -->
                    <h4 class="text-xs font-semibold text-white mb-2 line-clamp-2 group-hover:text-[#00E5FF] transition-colors duration-300 leading-tight min-h-[32px]">
                        {{ sprite.title }}
                    </h4>
                    
                    <!-- Info Row -->
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-medium text-[#FF2CCC] bg-[#FF2CCC]/10 px-2 py-0.5 rounded border border-[#FF2CCC]/20">
                            {{ sprite.year }}
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- Corner Accent -->
            <div class="absolute top-2 right-2 w-2 h-2 bg-[#00E5FF] rounded-full opacity-0 group-hover:opacity-100 group-hover:animate-ping transition-opacity duration-300"></div>
            <div class="absolute top-2 right-2 w-2 h-2 bg-[#00E5FF] rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    sprite: {
        type: Object,
        required: true
    }
});

const goToSprite = () => {
    const spriteId = props.sprite.id;
    window.location.href = `/sprite/${spriteId}`;
};
</script>

<style scoped>
@keyframes shine {
    0% {
        transform: translateX(-150%) skewX(-12deg);
    }
    100% {
        transform: translateX(150%) skewX(-12deg);
    }
}

@keyframes glitch {
    0%, 100% {
        transform: translate(0);
    }
    20% {
        transform: translate(-2px, 2px);
    }
    40% {
        transform: translate(-2px, -2px);
    }
    60% {
        transform: translate(2px, 2px);
    }
    80% {
        transform: translate(2px, -2px);
    }
}

.animate-shine {
    animation: shine 0.8s ease-out;
}

.animate-glitch {
    animation: glitch 0.3s infinite;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
