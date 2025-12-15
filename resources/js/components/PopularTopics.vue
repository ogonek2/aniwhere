<template>
    <div class="mb-6">
        <h3 class="text-2xl font-display font-bold mb-4 flex items-center">
            <span class="bg-gradient-to-r from-[#FF2CCC] to-[#7A1FFF] bg-clip-text text-transparent">
                Популярні теми
            </span>
        </h3>
        
        <div class="space-y-3">
            <div 
                v-for="topic in topics" 
                :key="topic.id"
                class="bg-[#1A1A2A]/70 backdrop-blur-sm border border-[#2A1A4A]/50 rounded-lg p-4 hover:border-[#7A1FFF]/70 transition-all duration-300 hover:shadow-lg hover:shadow-[#7A1FFF]/20 cursor-pointer group hover:scale-[1.02]"
            >
                <div class="flex items-start justify-between mb-2">
                    <div class="flex-1">
                        <h4 class="text-base font-semibold text-white mb-1.5 hover:text-[#00E5FF] transition-colors line-clamp-2">
                            {{ topic.title }}
                        </h4>
                        <p class="text-gray-400 text-xs mb-2 line-clamp-2">{{ topic.description }}</p>
                        <div class="flex items-center space-x-3 text-xs text-gray-500">
                            <span class="flex items-center hover:text-[#00E5FF] transition-colors">
                                <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M2 5a2 2 0 012-2h7a2 2 0 012 2v4a2 2 0 01-2 2H9l-3 3v-3H4a2 2 0 01-2-2V5z"></path>
                                    <path d="M15 7v2a4 4 0 01-4 4H9.828l-1.766 1.767c.28.149.599.233.938.233h2l3 3v-3h2a2 2 0 002-2V9a2 2 0 00-2-2h-1z"></path>
                                </svg>
                                {{ topic.replies }}
                            </span>
                            <span class="flex items-center hover:text-[#00E5FF] transition-colors">
                                <svg class="w-3.5 h-3.5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"></path>
                                </svg>
                                {{ topic.views }}
                            </span>
                        </div>
                    </div>
                    <div class="ml-3">
                        <span class="px-2 py-1 bg-[#2A1466]/60 text-[#A0E0FF] rounded-full text-xs font-medium border border-[#2A1A4A]/50">
                            {{ topic.category }}
                        </span>
                    </div>
                </div>
                <div class="flex items-center justify-between pt-2 border-t border-[#2A1A4A]/50">
                    <div class="flex items-center space-x-2">
                        <div class="w-6 h-6 bg-gradient-to-r from-[#FF2CCC] to-[#7A1FFF] rounded-full border border-[#7A1FFF]/50"></div>
                        <div>
                            <div class="text-xs font-medium text-gray-300">{{ topic.author }}</div>
                            <div class="text-xs text-gray-500">{{ topic.time }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const topics = ref([
    {
        id: 1,
        title: 'Обговорення нового сезону Demon Slayer',
        description: 'Що ви думаєте про останні епізоди? Давайте обговоримо!',
        category: 'Аніме',
        replies: 234,
        views: 1520,
        author: 'AnimeFan2024',
        time: '2 години тому'
    },
    {
        id: 2,
        title: 'Рекомендації: найкращі аніме 2024 року',
        description: 'Ділимося своїми топовими аніме цього року. Що подивитися?',
        category: 'Рекомендації',
        replies: 189,
        views: 2100,
        author: 'MangaLover',
        time: '5 годин тому'
    },
    {
        id: 3,
        title: 'Теорії та спойлери: One Piece Chapter 1100+',
        description: 'Обговорення останніх глав манги та теорій фанатів',
        category: 'Манга',
        replies: 456,
        views: 3200,
        author: 'PirateKing',
        time: '1 день тому'
    },
    {
        id: 4,
        title: 'Косплей конкурс: найкращі костюми цього місяця',
        description: 'Показуємо свої косплеї та голосуємо за найкращі!',
        category: 'Косплей',
        replies: 312,
        views: 4500,
        author: 'CosplayMaster',
        time: '2 дні тому'
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
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>
