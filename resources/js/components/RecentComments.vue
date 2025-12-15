<template>
    <section class="mb-8">
        <div class="container-grid">
            <h2 class="text-xl font-display font-bold mb-4 text-[#00E5FF]">
                Коментарі
            </h2>
            <div class="space-y-3">
                <div 
                    v-for="comment in comments" 
                    :key="comment.id"
                    class="bg-[#1A1A2A]/40 backdrop-blur-sm rounded-lg border border-[#2A1A4A]/30 p-4 hover:border-[#7A1FFF]/50 transition-all cursor-pointer group"
                >
                    <div class="flex items-start space-x-3">
                        <!-- Poster -->
                        <div class="flex-shrink-0 w-16 h-24 rounded overflow-hidden border border-[#2A1A4A]/50">
                            <img 
                                :src="comment.poster" 
                                :alt="comment.title"
                                class="w-full h-full object-cover"
                            />
                        </div>
                        
                        <!-- Content -->
                        <div class="flex-1 min-w-0">
                            <div class="flex items-start justify-between mb-1">
                                <div class="flex items-center space-x-2">
                                    <div class="w-6 h-6 rounded-full bg-gradient-to-br from-[#FF2CCC] to-[#7A1FFF] flex items-center justify-center text-xs font-bold">
                                        {{ comment.author.charAt(0) }}
                                    </div>
                                    <span class="text-xs font-medium text-gray-300">{{ comment.author }}</span>
                                    <span class="text-xs text-gray-500">{{ comment.time }}</span>
                                </div>
                                <span class="text-xs px-2 py-0.5 bg-[#2A1A4A]/50 rounded border border-[#7A1FFF]/20 text-[#7A1FFF]">
                                    {{ comment.type }}
                                </span>
                            </div>
                            <h3 class="text-sm font-semibold text-white group-hover:text-[#00E5FF] transition-colors mb-1">
                                {{ comment.title }}
                            </h3>
                            <p class="text-xs text-gray-400 line-clamp-2">{{ comment.text }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';

const comments = ref([
    {
        id: 1,
        author: 'Nagicchi',
        time: 'близько 2 годин тому',
        title: 'Акебоші Марія',
        text: 'втратила сина на власних очах через дії його однокласників, Вікір Ван Баскервіль : регресія через вбивство від рук власного батька',
        poster: 'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
        type: 'Аніме'
    },
    {
        id: 2,
        author: 'A_Sarisez',
        time: 'близько 7 годин тому',
        title: 'Месники',
        text: 'Лайт — був введений в оману й майже вбитий власним загоном, він мститиметься кожному з його членів.',
        poster: 'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
        type: 'Колекція'
    },
    {
        id: 3,
        author: 'AniVanchik',
        time: 'близько 10 годин тому',
        title: 'Бакуман - 3 сезон',
        text: '😭😭😭 як же я люблю це аніме, але воно всеодно закінчилось…:((((((',
        poster: 'https://images.unsplash.com/photo-1578632767115-351597cf2477?w=100&q=80',
        type: 'Аніме'
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
</style>

