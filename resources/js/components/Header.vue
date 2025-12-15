<template>
    <header class="sticky top-0 z-50 bg-[#1A1A2A]/95 backdrop-blur-md border-b border-[#2A1A4A]/50 transition-all duration-300">
        <div class="container-grid py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6">
                    <h1 class="text-xl font-display font-bold bg-gradient-to-r from-[#FF2CCC] to-[#7A1FFF] bg-clip-text text-transparent hover:scale-105 transition-transform">
                        ANIWHERE
                    </h1>
                    <nav class="hidden md:flex space-x-4">
                        <a href="#" class="text-sm text-[#A0E0FF] hover:text-[#00E5FF] transition-all duration-200 hover:scale-105 font-medium relative group">
                            Головна
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-[#00E5FF] group-hover:w-full transition-all duration-300"></span>
                        </a>
                        <a href="#" class="text-sm text-gray-400 hover:text-[#00E5FF] transition-all duration-200 hover:scale-105 relative group">
                            Форум
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-[#00E5FF] group-hover:w-full transition-all duration-300"></span>
                        </a>
                        <a href="#" class="text-sm text-gray-400 hover:text-[#00E5FF] transition-all duration-200 hover:scale-105 relative group">
                            Аніме
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-[#00E5FF] group-hover:w-full transition-all duration-300"></span>
                        </a>
                        <a href="#" class="text-sm text-gray-400 hover:text-[#00E5FF] transition-all duration-200 hover:scale-105 relative group">
                            Манга
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-[#00E5FF] group-hover:w-full transition-all duration-300"></span>
                        </a>
                        <a href="#" class="text-sm text-gray-400 hover:text-[#00E5FF] transition-all duration-200 hover:scale-105 relative group">
                            Спільнота
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-[#00E5FF] group-hover:w-full transition-all duration-300"></span>
                        </a>
                    </nav>
                </div>
                <div class="flex items-center space-x-3">
                    <button class="px-4 py-1.5 text-sm bg-gradient-to-r from-[#FF2CCC] to-[#7A1FFF] rounded-lg font-medium hover:opacity-90 transition-all duration-200 hover:scale-105 shadow-lg shadow-[#FF2CCC]/30">
                        Увійти
                    </button>
                    <button class="px-4 py-1.5 text-sm border border-[#7A1FFF] rounded-lg font-medium hover:bg-[#7A1FFF] transition-all duration-200 hover:scale-105">
                        Реєстрація
                    </button>
                </div>
            </div>
        </div>
    </header>
</template>

<style scoped>
.font-display {
    font-family: 'Tektur', sans-serif;
}
</style>
