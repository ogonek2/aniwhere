<template>
    <aside class="space-y-4">
        <!-- Statistics -->
        <div class="bg-[#1A1A2A]/40 backdrop-blur-sm rounded-lg border border-[#2A1A4A]/30 p-4">
            <h3 class="text-sm font-display font-bold mb-3 text-[#00E5FF]">
                Статистика
            </h3>
            <div class="space-y-2 text-xs">
                <div class="flex items-center justify-between">
                    <span class="text-gray-400">Користувачів</span>
                    <span class="font-semibold text-[#FF2CCC]">12,456</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-400">Тем</span>
                    <span class="font-semibold text-[#7A1FFF]">3,654</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-400">Повідомлень</span>
                    <span class="font-semibold text-[#00E5FF]">45,789</span>
                </div>
                <div class="pt-2 border-t border-[#2A1A4A]/20">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-400">Онлайн</span>
                        <span class="font-semibold text-green-400">234</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popular Topics -->
        <div class="bg-[#1A1A2A]/40 backdrop-blur-sm rounded-lg border border-[#2A1A4A]/30 p-4">
            <h3 class="text-sm font-display font-bold mb-3 text-[#00E5FF]">
                Популярні
            </h3>
            <div class="space-y-2">
                <div 
                    v-for="topic in popularTopics" 
                    :key="topic.id"
                    class="p-2 bg-[#1A1A1A]/30 rounded border border-[#2A1A4A]/20 hover:border-[#7A1FFF]/50 transition-all cursor-pointer group"
                >
                    <h4 class="text-xs font-medium text-white group-hover:text-[#00E5FF] transition-colors mb-1 line-clamp-2">
                        {{ topic.title }}
                    </h4>
                    <div class="text-xs text-gray-500">
                        {{ topic.replies }} відповідей
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-gradient-to-br from-[#FF2CCC]/10 to-[#7A1FFF]/10 rounded-lg border border-[#7A1FFF]/20 p-4">
            <button class="w-full px-4 py-2 bg-gradient-to-r from-[#FF2CCC] to-[#7A1FFF] rounded-lg text-sm font-medium hover:opacity-90 transition-all">
                Створити тему
            </button>
        </div>
    </aside>
</template>

<script setup>
import { ref } from 'vue';

const popularTopics = ref([
    {
        id: 1,
        title: 'Обговорення останнього епізоду',
        replies: 45
    },
    {
        id: 2,
        title: 'Теорії про фінал',
        replies: 128
    },
    {
        id: 3,
        title: 'Анонсовано новий сезон!',
        replies: 234
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
