<template>
    <div class="space-y-4">
        <!-- Latest Posts - Sticky -->
        <div class="sticky top-20 bg-[#1A1A2A]/80 backdrop-blur-md border border-[#2A1A4A]/50 rounded-lg p-4 hover:border-[#00E5FF]/50 transition-all duration-300">
            <h4 class="text-lg font-display font-bold mb-3 text-[#00E5FF]">Останні пости</h4>
            <div class="space-y-3">
                <div 
                    v-for="post in latestPosts" 
                    :key="post.id"
                    class="pb-3 border-b border-[#2A1A4A]/50 last:border-0 last:pb-0 group"
                >
                    <h5 class="text-xs font-medium text-white mb-1 hover:text-[#00E5FF] transition-all duration-200 cursor-pointer line-clamp-2 group-hover:translate-x-1">
                        {{ post.title }}
                    </h5>
                    <div class="flex items-center justify-between text-xs text-gray-500 mt-1.5">
                        <span class="hover:text-[#00E5FF] transition-colors">{{ post.author }}</span>
                        <span>{{ post.time }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="bg-[#1A1A2A]/80 backdrop-blur-md border border-[#2A1A4A]/50 rounded-lg p-4 hover:border-[#FF2CCC]/50 transition-all duration-300">
            <h4 class="text-lg font-display font-bold mb-3 text-[#FF2CCC]">Категорії</h4>
            <div class="space-y-1.5">
                <a 
                    v-for="category in categories" 
                    :key="category.id"
                    href="#"
                    class="flex items-center justify-between p-2 bg-[#1A1A1A]/40 rounded-lg hover:bg-[#2A1A4A]/50 transition-all duration-200 group hover:translate-x-1"
                >
                    <span class="text-xs text-gray-300 group-hover:text-white">{{ category.name }}</span>
                    <span class="text-xs text-gray-500 group-hover:text-[#00E5FF]">{{ category.count }}</span>
                </a>
            </div>
        </div>

        <!-- Trending -->
        <div class="bg-gradient-to-br from-[#2A1466]/60 to-[#003C78]/60 backdrop-blur-md border border-[#7A1FFF]/50 rounded-lg p-4 hover:border-[#7A1FFF] transition-all duration-300 hover:shadow-lg hover:shadow-[#7A1FFF]/20">
            <h4 class="text-lg font-display font-bold mb-3 text-white">🔥 Тренди</h4>
            <div class="space-y-2.5">
                <div 
                    v-for="trend in trending" 
                    :key="trend.id"
                    class="flex items-center space-x-2.5 group hover:translate-x-1 transition-transform duration-200"
                >
                    <div class="w-8 h-8 bg-[#FF2CCC] rounded-lg flex items-center justify-center font-bold text-white text-xs group-hover:scale-110 transition-transform shadow-lg shadow-[#FF2CCC]/30">
                        {{ trend.rank }}
                    </div>
                    <div class="flex-1">
                        <div class="text-xs font-medium text-white group-hover:text-[#00E5FF] transition-colors">{{ trend.title }}</div>
                        <div class="text-xs text-[#A0E0FF]">{{ trend.category }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const latestPosts = ref([
    { id: 1, title: 'Нове аніме від Studio Ghibli!', author: 'GhibliFan', time: '10 хв тому' },
    { id: 2, title: 'Огляд: Jujutsu Kaisen S2', author: 'Reviewer', time: '25 хв тому' },
    { id: 3, title: 'Топ-10 романтичних аніме', author: 'RomanceLover', time: '1 година тому' },
    { id: 4, title: 'Меми про аніме персонажів', author: 'MemeLord', time: '2 години тому' },
    { id: 5, title: 'Обговорення: найкращий OST 2024', author: 'MusicFan', time: '3 години тому' }
]);

const categories = ref([
    { id: 1, name: 'Аніме', count: 1250 },
    { id: 2, name: 'Манга', count: 890 },
    { id: 3, name: 'Косплей', count: 456 },
    { id: 4, name: 'Ігри', count: 320 },
    { id: 5, name: 'Загальне', count: 2100 }
]);

const trending = ref([
    { id: 1, rank: 1, title: 'Demon Slayer S4', category: 'Аніме' },
    { id: 2, rank: 2, title: 'One Piece Chapter 1105', category: 'Манга' },
    { id: 3, rank: 3, title: 'Jujutsu Kaisen', category: 'Аніме' },
    { id: 4, rank: 4, title: 'Chainsaw Man', category: 'Манга' },
    { id: 5, rank: 5, title: 'Attack on Titan', category: 'Аніме' }
]);
</script>

<style scoped>
.font-display {
    font-family: 'Tektur', sans-serif;
}

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
