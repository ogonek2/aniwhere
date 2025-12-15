<template>
    <section>
        <div class="container-grid">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-display font-bold text-[#00E5FF]">
                    Останні теми
                </h2>
                <button class="px-4 py-2 bg-gradient-to-r from-[#FF2CCC] to-[#7A1FFF] rounded-lg text-sm font-medium hover:opacity-90 transition-all">
                    + Створити тему
                </button>
            </div>
            
            <div class="bg-[#1A1A2A]/40 backdrop-blur-sm rounded-lg border border-[#2A1A4A]/30 overflow-hidden">
                <!-- Topics List -->
                <div class="divide-y divide-[#2A1A4A]/20">
                    <div 
                        v-for="topic in topics" 
                        :key="topic.id"
                        class="p-4 hover:bg-[#1A1A1A]/30 transition-all duration-150 cursor-pointer group"
                    >
                        <div class="flex items-start space-x-4">
                            <!-- Icon -->
                            <div class="flex-shrink-0 text-xl">{{ topic.icon }}</div>
                            
                            <!-- Content -->
                            <div class="flex-1 min-w-0">
                                <h3 class="text-sm font-medium text-white group-hover:text-[#00E5FF] transition-colors mb-1">
                                    {{ topic.title }}
                                </h3>
                                <div class="flex items-center space-x-3 text-xs text-gray-500">
                                    <span>{{ topic.author }}</span>
                                    <span>•</span>
                                    <span>{{ topic.created }}</span>
                                    <span class="px-1.5 py-0.5 bg-[#2A1A4A]/50 rounded text-[#7A1FFF]">
                                        {{ topic.category }}
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Stats -->
                            <div class="flex-shrink-0 text-right">
                                <div class="text-sm font-semibold text-[#00E5FF]">{{ topic.replies }}</div>
                                <div class="text-xs text-gray-500">відповідей</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="p-3 bg-[#1A1A1A]/20 border-t border-[#2A1A4A]/20 flex items-center justify-center space-x-2">
                    <button class="px-3 py-1 bg-[#1A1A1A]/40 border border-[#2A1A4A] rounded text-xs text-gray-400 hover:text-[#00E5FF] hover:border-[#00E5FF] transition-all">
                        ‹
                    </button>
                    <button class="px-3 py-1 bg-gradient-to-r from-[#FF2CCC] to-[#7A1FFF] rounded text-xs font-semibold">
                        1
                    </button>
                    <button class="px-3 py-1 bg-[#1A1A1A]/40 border border-[#2A1A4A] rounded text-xs text-gray-400 hover:text-[#00E5FF] hover:border-[#00E5FF] transition-all">
                        2
                    </button>
                    <button class="px-3 py-1 bg-[#1A1A1A]/40 border border-[#2A1A4A] rounded text-xs text-gray-400 hover:text-[#00E5FF] hover:border-[#00E5FF] transition-all">
                        3
                    </button>
                    <button class="px-3 py-1 bg-[#1A1A1A]/40 border border-[#2A1A4A] rounded text-xs text-gray-400 hover:text-[#00E5FF] hover:border-[#00E5FF] transition-all">
                        ›
                    </button>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { ref } from 'vue';

const topics = ref([
    {
        id: 1,
        title: 'Обговорення останнього епізоду "Моя геройська академія"',
        category: 'Аніме',
        icon: '🎌',
        author: 'AnimeFan',
        created: '2 години тому',
        replies: 45
    },
    {
        id: 2,
        title: 'Теорії про фінал "Атака титанів"',
        category: 'Аніме',
        icon: '🎌',
        author: 'TheoryGuy',
        created: '5 годин тому',
        replies: 128
    },
    {
        id: 3,
        title: 'Нова манга "Demon Slayer" - розбір глави 205',
        category: 'Манга',
        icon: '📚',
        author: 'MangaReader',
        created: '1 день тому',
        replies: 67
    },
    {
        id: 4,
        title: 'Анонсовано новий сезон "One Piece"!',
        category: 'Новинки',
        icon: '✨',
        author: 'NewsBot',
        created: '2 дні тому',
        replies: 234
    },
    {
        id: 5,
        title: 'Мій фан-арт до "Jujutsu Kaisen"',
        category: 'Фан-арт',
        icon: '🎨',
        author: 'Artist123',
        created: '3 дні тому',
        replies: 89
    },
    {
        id: 6,
        title: 'Косплей на Gojo Satoru - фотосесія',
        category: 'Косплей',
        icon: '📸',
        author: 'Cosplayer',
        created: '4 дні тому',
        replies: 156
    },
    {
        id: 7,
        title: 'Рекомендації аніме схожого на "Death Note"',
        category: 'Обговорення',
        icon: '💬',
        author: 'Seeker',
        created: '5 днів тому',
        replies: 34
    },
    {
        id: 8,
        title: 'Огляд нової манги "Chainsaw Man"',
        category: 'Манга',
        icon: '📚',
        author: 'Reviewer',
        created: '6 днів тому',
        replies: 78
    }
]);
</script>

<style scoped>
.font-display {
    font-family: 'Tektur', sans-serif;
}
</style>
