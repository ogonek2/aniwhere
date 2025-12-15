<template>
    <div class="relative min-h-screen overflow-hidden">
        <!-- Background Image with Parallax -->
        <div 
            class="fixed inset-0 z-0 opacity-100"
            :style="{ transform: `translateY(${parallaxOffset}px)` }"
        >
            <img 
                src="/storage/src/vsthemes-org.jpg" 
                alt="Anime Background" 
                class="w-full h-[120%] object-cover"
            />
            <div class="absolute inset-0 bg-gradient-to-b from-[#1A1A1A] via-[#1A1A1A]/20 to-[#1A1A1A]"></div>
        </div>

        <!-- Content with parallax layers -->
        <div class="relative z-10">
            <Header />
            <Hero :parallax-offset="parallaxOffset * 0.3" />
            <Stats />
            <main class="container mx-auto px-4 py-8">
                <div class="grid lg:grid-cols-3 gap-6">
                    <div class="lg:col-span-2">
                        <PopularTopics />
                    </div>
                    <div>
                        <Sidebar />
                    </div>
                </div>
            </main>
            <Footer />
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import Header from './Header.vue';
import Hero from './Hero.vue';
import Stats from './Stats.vue';
import PopularTopics from './PopularTopics.vue';
import Sidebar from './Sidebar.vue';
import Footer from './Footer.vue';

const parallaxOffset = ref(0);

const handleScroll = () => {
    parallaxOffset.value = window.scrollY * 0.5;
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>
