<!-- HERO BACKGROUND -->
<div class="relative overflow-hidden bg-gradient-to-br
            from-red-50 via-white to-pink-50
            dark:from-gray-900 dark:via-gray-800 dark:to-black">

    <!-- DECOR -->
    <div class="absolute inset-0
        bg-[radial-gradient(circle_at_20%_20%,rgba(255,0,0,.12),transparent_60%),
            radial-gradient(circle_at_80%_80%,rgba(255,85,85,.15),transparent_60%)]">
    </div>


    <!-- FITNESS HERO -->
    <div class="relative text-center py-24 px-4">

        <span class="inline-block mb-4 px-5 py-2
                     bg-red-100 text-red-600
                     text-xs font-semibold rounded-full shadow">

            🥗 Nutrition • Exercise • Tracking

        </span>

        <h1 class="text-5xl md:text-6xl font-extrabold
                   text-gray-900 dark:text-white
                   leading-tight">

            🏋️ Fitness <span class="text-red-500">Tracker</span>
        </h1>

        <p class="mt-6 text-lg
                  text-gray-600 dark:text-gray-400
                  max-w-2xl mx-auto">

            Kişisel antrenmanlarını, beslenmeni ve vücut ölçümlerini
            tek panel üzerinden takip et.
            Hedefine ulaşmak artık çok daha kolay.
        </p>


        <!-- BUTTONS -->
        <div class="mt-8 flex flex-col sm:flex-row
                    justify-center gap-4">

            <a href="/register"
               class="px-8 py-4 bg-red-500 text-white
                      rounded-full shadow-lg
                      hover:bg-red-600 hover:scale-105
                      transition">

                🚀 Hemen Başla

            </a>

            <a href="/dashboard"
               class="px-8 py-4
                      border border-gray-300
                      dark:border-gray-700
                      rounded-full
                      backdrop-blur-sm
                      hover:bg-gray-100
                      dark:hover:bg-gray-800
                      hover:scale-105
                      transition">

                📊 Dashboard

            </a>

        </div>

    </div>


    <!-- STATS -->
    <div class="relative grid grid-cols-1 md:grid-cols-3
                gap-6 max-w-6xl mx-auto px-6 pb-20">

        <div class="stat-box">
            <h3>+1200</h3>
            <p>Aktif Kullanıcı</p>
        </div>

        <div class="stat-box">
            <h3>+300</h3>
            <p>Günlük Program</p>
        </div>

        <div class="stat-box">
            <h3>95%</h3>
            <p>Memnuniyet</p>
        </div>

    </div>
</div>


<!-- FEATURES -->
<div class="max-w-6xl mx-auto px-6">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-20">

        <div class="feature-card">
            <h3>📊 Vücut Ölçüm Takibi</h3>
            <p>
                Kilo, yağ oranı ve BMI değerlerini kaydet
                ve değişimleri grafiklerle analiz et.
            </p>
        </div>

        <div class="feature-card">
            <h3>🍽️ Kişisel Beslenme Planı</h3>
            <p>
                Diyetisyen destekli kalori & makro hesaplama.
            </p>
        </div>

        <div class="feature-card">
            <h3>🏃 Günlük Antrenman</h3>
            <p>
                Sana özel planlarla maksimum performans.
            </p>
        </div>

        <div class="feature-card">
            <h3>🔥 Motivasyon Takibi</h3>
            <p>
                Rozet sistemi & haftalık hedef analizleriyle
                disiplinini koru.
            </p>
        </div>

    </div>

</div>


<!-- CTA -->
<div class="relative text-center mb-24">

    <div class="inline-block px-10 py-12
                bg-gradient-to-r from-red-500 to-pink-500
                rounded-3xl shadow-2xl
                animate-pulse-slow">

        <h2 class="text-3xl font-bold text-white mb-4">
            Fit bir hayat için ilk adımı at!
        </h2>

        <a href="/register"
           class="inline-block px-8 py-4
                  bg-white text-red-600
                  rounded-full font-semibold
                  hover:scale-105
                  transition">

            Ücretsiz Kaydol

        </a>

    </div>

</div>


<!-- INLINE UI SUPPORT -->
<style>

.stat-box{
    background:white;
    border-radius:1rem;
    padding:2rem 1.5rem;
    text-align:center;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    transition:.3s ease;
}
.stat-box:hover{
    transform:translateY(-6px) scale(1.02);
}
.stat-box h3{
    font-size:2.4rem;
    font-weight:800;
    color:#ef4444;
}
.stat-box p{
    color:#6b7280;
    margin-top:.5rem;
}

.feature-card{
    background:white;
    border-radius:1rem;
    padding:2rem;
    box-shadow:0 12px 28px rgba(0,0,0,.08);
    border-left:6px solid #ef4444;
    transition:.3s ease;
}
.feature-card:hover{
    transform:translateY(-6px);
}
.feature-card h3{
    font-size:1.25rem;
    font-weight:700;
    color:#111827;
    margin-bottom:.5rem;
}
.feature-card p{
    color:#6b7280;
}

.animate-pulse-slow{
    animation:pulse 2.6s infinite;
}

@keyframes pulse{
    0%{ transform:scale(1); }
    50%{ transform:scale(1.03); }
    100%{ transform:scale(1); }
}

</style>
