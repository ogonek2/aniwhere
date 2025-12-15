<template>
    <section class="mb-8">
        <div class="container-grid">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-display font-bold text-[#00E5FF]">
                    Статті
                </h2>
                <div class="flex items-center space-x-2 text-xs">
                    <button class="px-3 py-1 bg-[#1A1A1A]/40 border border-[#2A1A4A] rounded text-gray-400 hover:text-[#00E5FF] hover:border-[#00E5FF] transition-all">
                        Новини
                    </button>
                    <button class="px-3 py-1 bg-[#1A1A1A]/40 border border-[#2A1A4A] rounded text-gray-400 hover:text-[#00E5FF] hover:border-[#00E5FF] transition-all">
                        Огляди
                    </button>
                    <button class="px-3 py-1 bg-[#1A1A1A]/40 border border-[#2A1A4A] rounded text-gray-400 hover:text-[#00E5FF] hover:border-[#00E5FF] transition-all">
                        Авторське
                    </button>
                </div>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div 
                    v-for="article in articles" 
                    :key="article.id"
                    class="bg-[#1A1A2A]/40 backdrop-blur-sm rounded-lg border border-[#2A1A4A]/30 hover:border-[#7A1FFF]/50 transition-all cursor-pointer group overflow-hidden"
                >
                    <!-- Poster -->
                    <div class="aspect-[16/9] overflow-hidden bg-[#1A1A1A]/40">
                        <img 
                            :src="article.poster" 
                            :alt="article.title"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                        />
                    </div>
                    
                    <!-- Content -->
                    <div class="p-4">
                        <div class="flex items-center space-x-2 mb-2">
                            <span class="text-xs px-2 py-0.5 bg-[#2A1A4A]/50 rounded border border-[#7A1FFF]/20 text-[#7A1FFF]">
                                {{ article.category }}
                            </span>
                            <span class="text-xs text-gray-500">{{ article.time }}</span>
                        </div>
                        <h3 class="text-sm font-semibold text-white group-hover:text-[#00E5FF] transition-colors mb-2 line-clamp-2">
                            {{ article.title }}
                        </h3>
                        <p class="text-xs text-gray-400 line-clamp-3 mb-3">{{ article.description }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <div class="w-5 h-5 rounded-full bg-gradient-to-br from-[#FF2CCC] to-[#7A1FFF] flex items-center justify-center text-xs font-bold">
                                    {{ article.author.charAt(0) }}
                                </div>
                                <span class="text-xs text-gray-400">{{ article.author }}</span>
                            </div>
                            <div class="flex items-center space-x-1 text-xs text-gray-500">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.834a1 1 0 001.8.6l2.7-3.6-2.7-3.6a1 1 0 00-1.8.6zM12.265 8.29l-2.7 3.6a1 1 0 101.343 1.343l2.7-3.6a1 1 0 00-1.343-1.343zM16 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6z"></path>
                                </svg>
                                <span>{{ article.views }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';

const articles = ref([
    {
        id: 1,
        title: 'Відгук на "Служба доставки Кікі, юної відьми" (1989)',
        description: 'Милий фільм. Історія про дівчинку-відьму з селища, яка в 13-ть років вирушила в подорож зі своїм котом, щоб знайти собі нове місто біля океану та працювати там для людей.',
        author: 'Tokiyaro',
        time: '1 день тому',
        category: 'Огляди',
        views: 1000,
        poster: 'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=400&q=80'
    },
    {
        id: 2,
        title: 'Відгук на Меч мисливця на демонів (2025)',
        description: 'Початок був доволі ніяким. Хоча драма першої серії була шикарна. Але дії ГГ(Джінти) мені видалися дивними. Він хотів догнати свою сестру, але йому завадив демон.',
        author: 'Tokiyaro',
        time: '2 дні тому',
        category: 'Огляди',
        views: 1000,
        poster: 'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=400&q=80'
    },
    {
        id: 3,
        title: 'Відгук на Театр мороку (2013)',
        description: 'Ось це аніме звісно. Я гадав, що це буде крінж якийсь і я буду душнитися. А єдина претензія у мене, що серії такі короткі. Хоча б по 10 хв. їх зробили.',
        author: 'Tokiyaro',
        time: '2 дні тому',
        category: 'Огляди',
        views: 601,
        poster: 'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=400&q=80'
    }
]);
</script>

<style scoped>
.font-display {
    font-family: 'Tektur', sans-serif;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>

