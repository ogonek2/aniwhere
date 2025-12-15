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
                    src="/storage/src/vsthemes-org.jpg" 
                    alt="Anime Background" 
                    class="w-full h-full object-cover"
                    :style="{ 
                        height: `calc(100vh + ${Math.max(0, parallaxOffset)}px)`,
                        minHeight: '100vh',
                        objectPosition: 'center top',
                        transformOrigin: 'center top'
                    }"
                />
            </div>
            <div class="absolute inset-0 bg-gradient-to-b from-[#1A1A1A] via-[#1A1A1A]/20 to-[#1A1A1A]"></div>
        </div>

        <!-- Content -->
        <div class="relative z-10">
            <Header />
            <Hero :parallax-offset="parallaxOffset" />
            
            <!-- Main Content -->
            <main class="container-grid py-8">
                <!-- Recent Comments -->
                <RecentComments />
                
                <!-- Collections -->
                <Collections />
                
                <!-- Articles -->
                <Articles />
                
                <!-- Calendar -->
                <Calendar />
            </main>
            
            <Footer />
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue';
import Header from './Header.vue';
import Hero from './Hero.vue';
import Footer from './Footer.vue';
import RecentComments from './RecentComments.vue';
import Collections from './Collections.vue';
import Articles from './Articles.vue';
import Calendar from './Calendar.vue';

const parallaxOffset = ref(0);

const handleScroll = () => {
    parallaxOffset.value = window.scrollY * 0.5;
};

onMounted(() => {
    window.addEventListener('scroll', handleScroll, { passive: true });
});

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll);
});
</script>
