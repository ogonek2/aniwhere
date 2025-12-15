<template>
    <section class="py-4">
        <div class="container-grid">
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center space-x-3">
                    <div class="w-1 h-6 bg-gradient-to-b from-[#FF2CCC] to-[#7A1FFF] rounded-full"></div>
                    <h3 class="text-base font-display font-bold text-white">
                        Спрайти
                    </h3>
                    <span class="text-xs text-gray-400">Обговорення матеріалів</span>
                </div>
                <div class="flex items-center space-x-2">
                    <button 
                        @click="scrollLeft" 
                        :disabled="!canScrollLeft"
                        class="p-2 rounded-lg bg-[#1A1A1A]/60 backdrop-blur-sm border border-[#2A1A4A]/50 hover:border-[#00E5FF]/50 transition-all duration-200 hover:scale-110 disabled:opacity-30 disabled:cursor-not-allowed group"
                    >
                        <svg class="w-4 h-4 text-gray-400 group-hover:text-[#00E5FF] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button 
                        @click="scrollRight" 
                        :disabled="!canScrollRight"
                        class="p-2 rounded-lg bg-[#1A1A1A]/60 backdrop-blur-sm border border-[#2A1A4A]/50 hover:border-[#00E5FF]/50 transition-all duration-200 hover:scale-110 disabled:opacity-30 disabled:cursor-not-allowed group"
                    >
                        <svg class="w-4 h-4 text-gray-400 group-hover:text-[#00E5FF] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div 
                ref="sliderRef"
                class="flex space-x-4 overflow-x-auto scrollbar-hide scroll-smooth pb-2"
                style="scrollbar-width: none; -ms-overflow-style: none;"
                @scroll="checkScroll"
            >
                <div v-if="loading" class="flex items-center justify-center w-full py-8">
                    <div class="text-gray-400">Завантаження...</div>
                </div>
                <SpriteCard 
                    v-else
                    v-for="sprite in sprites" 
                    :key="sprite.id"
                    :sprite="sprite"
                />
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import SpriteCard from './SpriteCard.vue';

const sliderRef = ref(null);
const canScrollLeft = ref(false);
const canScrollRight = ref(true);
const sprites = ref([]);
const loading = ref(true);

const fetchSprites = async () => {
    try {
        loading.value = true;
        const response = await axios.get('/api/sprites?limit=20');
        sprites.value = response.data.map(sprite => ({
            id: sprite.id,
            title: sprite.title_ukrainian,
            year: sprite.anime && sprite.anime.length > 0 
                ? (sprite.anime[0].aired_from ? new Date(sprite.anime[0].aired_from).getFullYear() : 'N/A')
                : 'N/A',
            type: sprite.anime && sprite.anime.length > 0 
                ? (sprite.anime[0].type || 'TV Серіал')
                : 'TV Серіал',
            image: sprite.image_url || (sprite.anime && sprite.anime.length > 0 ? sprite.anime[0].image_url : null) || 'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=200&q=80'
        }));
    } catch (error) {
        console.error('Error fetching sprites:', error);
    } finally {
        loading.value = false;
    }
};

const checkScroll = () => {
    if (sliderRef.value) {
        const { scrollLeft, scrollWidth, clientWidth } = sliderRef.value;
        canScrollLeft.value = scrollLeft > 0;
        canScrollRight.value = scrollLeft < scrollWidth - clientWidth - 10;
    }
};

const scrollLeft = () => {
    if (sliderRef.value) {
        sliderRef.value.scrollBy({ left: -250, behavior: 'smooth' });
    }
};

const scrollRight = () => {
    if (sliderRef.value) {
        sliderRef.value.scrollBy({ left: 250, behavior: 'smooth' });
    }
};

onMounted(() => {
    fetchSprites();
    checkScroll();
});
</script>

<style scoped>
.font-display {
    font-family: 'Tektur', sans-serif;
}

.scrollbar-hide::-webkit-scrollbar {
    display: none;
}
</style>
