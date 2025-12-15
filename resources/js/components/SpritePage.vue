<template>
    <div class="relative min-h-screen overflow-hidden">
        <!-- Background Image with Parallax -->
        <div 
            class="fixed inset-0 z-0"
        >
            <div
                class="absolute top-0 left-0 right-0 w-full overflow-hidden"
                style="height: 100vh; min-height: 100vh;"
            >
                <img 
                    :src="sprite.image_url || (sprite.anime && sprite.anime.length > 0 ? sprite.anime[0].image_url : '/storage/src/vsthemes-org.jpg')" 
                    alt="Sprite Background" 
                    class="w-full h-full object-cover"
                    :style="{ 
                        height: `calc(100vh + ${Math.max(0, parallaxOffset)}px)`,
                        minHeight: '100vh',
                        objectPosition: 'center top',
                        transformOrigin: 'center top'
                    }"
                />
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-[#1A1A1A] via-[#1A1A1A]/30 to-[#1A1A1A]"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10">
            <!-- Header -->
            <header class="sticky top-0 z-50 bg-[#1A1A2A]/95 backdrop-blur-md border-b border-[#2A1A4A]/50">
                <div class="container-grid py-3">
                    <div class="flex items-center justify-between">
                        <a href="/" class="text-xl font-display font-bold bg-gradient-to-r from-[#FF2CCC] to-[#7A1FFF] bg-clip-text text-transparent hover:scale-105 transition-transform">
                            ANIWHERE
                        </a>
                        <button 
                            @click="goBack"
                            class="px-4 py-1.5 text-sm border border-[#7A1FFF] rounded-lg font-medium hover:bg-[#7A1FFF] transition-all duration-200 hover:scale-105"
                        >
                            Назад
                        </button>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="container-grid py-12" v-if="!loading">
                <div class="max-w-4xl mx-auto">
                    <!-- Sprite Header -->
                    <div class="mb-8">
                        <h1 class="text-3xl md:text-4xl font-display font-bold mb-6 bg-gradient-to-r from-[#FF2CCC] via-[#7A1FFF] to-[#00E5FF] bg-clip-text text-transparent">
                            {{ sprite.title_ukrainian }}
                        </h1>
                        
                        <div v-if="sprite.description_ukrainian" class="mb-6">
                            <p class="text-sm text-gray-300 leading-relaxed">{{ sprite.description_ukrainian }}</p>
                        </div>

                        <!-- Attached Anime -->
                        <div v-if="sprite.anime && sprite.anime.length > 0" class="mb-8">
                            <h2 class="text-xl font-display font-bold mb-4 text-[#00E5FF]">
                                Пов'язані аніме
                            </h2>
                            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <div 
                                    v-for="anime in sprite.anime" 
                                    :key="anime.id"
                                    class="bg-[#1A1A2A]/60 backdrop-blur-md rounded-lg border border-[#2A1A4A]/50 p-4 hover:border-[#7A1FFF]/50 transition-all"
                                >
                                    <div class="aspect-[2/3] rounded-lg overflow-hidden mb-3">
                                        <img 
                                            :src="anime.image_url || '/storage/src/vsthemes-org.jpg'" 
                                            :alt="anime.title_ukrainian"
                                            class="w-full h-full object-cover"
                                        />
                                    </div>
                                    <h3 class="text-sm font-semibold text-white mb-1">{{ anime.title_ukrainian }}</h3>
                                    <div class="flex items-center space-x-2 text-xs text-gray-400">
                                        <span>{{ anime.type }}</span>
                                        <span v-if="anime.aired_from">• {{ new Date(anime.aired_from).getFullYear() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Discussion Groups -->
                    <div class="bg-[#1A1A2A]/60 backdrop-blur-md rounded-xl border border-[#2A1A4A]/50 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-display font-bold text-[#00E5FF]">
                                Групи обговорень
                            </h2>
                            <button 
                                @click="showCreateGroupModal = true"
                                class="px-4 py-2 bg-gradient-to-r from-[#FF2CCC] to-[#7A1FFF] rounded-lg text-sm font-semibold hover:opacity-90 transition-all"
                            >
                                + Створити групу
                            </button>
                        </div>
                        
                        <div v-if="sprite.discussion_groups && sprite.discussion_groups.length > 0" class="space-y-4">
                            <div 
                                v-for="group in sprite.discussion_groups" 
                                :key="group.id"
                                class="bg-[#1A1A1A]/60 rounded-lg p-4 border border-[#2A1A4A]/30 hover:border-[#7A1FFF]/50 transition-all duration-300 cursor-pointer group"
                                @click="selectGroup(group)"
                            >
                                <h3 class="text-lg font-semibold text-white mb-2 group-hover:text-[#00E5FF] transition-colors">
                                    {{ group.title_ukrainian }}
                                </h3>
                                <p v-if="group.description_ukrainian" class="text-sm text-gray-400 mb-3">{{ group.description_ukrainian }}</p>
                                <div class="flex items-center justify-between text-xs text-gray-500">
                                    <span>{{ group.discussions_count }} обговорень</span>
                                    <span>{{ formatDate(group.created_at) }}</span>
                                </div>
                            </div>
                        </div>
                        <div v-else class="text-center py-8 text-gray-400">
                            Поки що немає груп обговорень
                        </div>
                    </div>

                    <!-- Selected Group Discussions -->
                    <div v-if="selectedGroup" class="mt-8 bg-[#1A1A2A]/60 backdrop-blur-md rounded-xl border border-[#2A1A4A]/50 p-6">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-xl font-display font-bold text-[#00E5FF]">
                                {{ selectedGroup.title_ukrainian }}
                            </h2>
                            <button 
                                @click="selectedGroup = null"
                                class="text-sm text-gray-400 hover:text-[#00E5FF] transition-colors"
                            >
                                Закрити
                            </button>
                        </div>
                        
                        <div v-if="selectedGroup.discussions && selectedGroup.discussions.length > 0" class="space-y-4">
                            <div 
                                v-for="discussion in selectedGroup.discussions" 
                                :key="discussion.id"
                                class="bg-[#1A1A1A]/60 rounded-lg p-4 border border-[#2A1A4A]/30 hover:border-[#7A1FFF]/50 transition-all duration-300 cursor-pointer group"
                            >
                                <h3 class="text-lg font-semibold text-white mb-2 group-hover:text-[#00E5FF] transition-colors">
                                    {{ discussion.title_ukrainian }}
                                </h3>
                                <p class="text-sm text-gray-400 mb-3 line-clamp-2">{{ discussion.content_ukrainian }}</p>
                                <div class="flex items-center justify-between text-xs text-gray-500">
                                    <span>{{ formatDate(discussion.created_at) }}</span>
                                    <span>{{ discussion.replies_count }} відповідей</span>
                                </div>
                            </div>
                        </div>
                        <div v-else class="text-center py-8 text-gray-400">
                            Поки що немає обговорень в цій групі
                        </div>

                        <button 
                            @click="showCreateDiscussionModal = true"
                            class="mt-6 w-full px-6 py-3 bg-[#1A1A1A]/60 border-2 border-dashed border-[#2A1A4A] rounded-lg text-gray-400 hover:text-[#00E5FF] hover:border-[#00E5FF] transition-all duration-300"
                        >
                            + Створити нове обговорення
                        </button>
                    </div>
                </div>
            </main>
            
            <div v-else class="container-grid py-12">
                <div class="text-center text-gray-400">Завантаження...</div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import axios from 'axios';

const parallaxOffset = ref(0);
const sprite = ref({});
const loading = ref(true);
const selectedGroup = ref(null);
const showCreateGroupModal = ref(false);
const showCreateDiscussionModal = ref(false);

const getSpriteIdFromUrl = () => {
    const path = window.location.pathname;
    const match = path.match(/\/sprite\/(\d+)/);
    return match ? parseInt(match[1]) : 1;
};

const fetchSprite = async () => {
    try {
        loading.value = true;
        const spriteId = getSpriteIdFromUrl();
        const response = await axios.get(`/api/sprites/${spriteId}`);
        sprite.value = response.data;
    } catch (error) {
        console.error('Error fetching sprite:', error);
    } finally {
        loading.value = false;
    }
};

const selectGroup = async (group) => {
    selectedGroup.value = group;
    // Загружаем полный список обсуждений группы
    try {
        const response = await axios.get(`/api/sprites/${sprite.value.id}/discussion-groups/${group.id}`);
        selectedGroup.value = response.data;
    } catch (error) {
        console.error('Error fetching discussions:', error);
    }
};

const formatDate = (dateString) => {
    if (!dateString) return '';
    const date = new Date(dateString);
    const now = new Date();
    const diff = now - date;
    const minutes = Math.floor(diff / 60000);
    const hours = Math.floor(diff / 3600000);
    const days = Math.floor(diff / 86400000);
    
    if (minutes < 60) return `${minutes} хв тому`;
    if (hours < 24) return `${hours} год тому`;
    if (days < 7) return `${days} днів тому`;
    return date.toLocaleDateString('uk-UA');
};

const handleScroll = () => {
    parallaxOffset.value = window.scrollY * 0.5;
};

const goBack = () => {
    window.location.href = '/';
};

onMounted(() => {
    fetchSprite();
    window.addEventListener('scroll', handleScroll, { passive: true });
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
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
