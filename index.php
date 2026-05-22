<?php
$jsonBrut = file_get_contents('data.json');
$superHeros = json_decode($jsonBrut, true) ?? [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>⚡ Super-Database</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen font-sans">

    <header class="border-b border-slate-800 bg-slate-900/50 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <a href="index.php" class="text-2xl font-black tracking-wider bg-gradient-to-r from-blue-400 to-indigo-500 bg-clip-text text-transparent">
                ⚡ SUPER.JSON
            </a>
            <a href="ajouter.php" class="bg-blue-600 hover:bg-blue-500 text-white font-medium px-4 py-2 rounded-lg transition-colors duration-200 text-sm shadow-lg shadow-blue-600/20">
                + Ajouter un héros
            </a>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-12">
        <div class="mb-10 text-center sm:text-left">
            <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl">L'Annuaire des Métahumains</h1>
            <p class="mt-3 text-lg text-slate-400">Une base de données ultra-rapide propulsée nativement par PHP & JSON.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (empty($superHeros)): ?>
                <div class="col-span-full bg-slate-800/50 border border-slate-700 rounded-xl p-8 text-center text-slate-400">
                    Aucun héros enregistré pour le moment. Soyez le premier à en ajouter un !
                </div>
            <?php else: ?>
                <?php foreach ($superHeros as $heros): ?>
                    <div class="bg-slate-800 border border-slate-700/60 rounded-xl p-6 hover:border-slate-600 transition-all duration-200 flex flex-col justify-between group hover:-translate-y-1 hover:shadow-xl hover:shadow-blue-500/5">
                        <div>
                            <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-700 text-slate-300 mb-4">
                                ID: #<?= $heros['id'] ?>
                            </div>
                            <h3 class="text-xl font-bold text-white group-hover:text-blue-400 transition-colors">
                                <?= htmlspecialchars($heros['nom']) ?>
                            </h3>
                            <p class="text-sm text-slate-400 mt-1 flex items-center gap-1">
                                📍 <?= htmlspecialchars($heros['ville']) ?>
                            </p>
                        </div>
                        
                        <div class="mt-6 pt-4 border-t border-slate-700/50">
                            <a href="detail.php?id=<?= $heros['id'] ?>" class="w-full inline-flex justify-center items-center bg-slate-700 hover:bg-blue-600 text-white text-sm font-medium px-4 py-2.5 rounded-lg transition-colors duration-200">
                                Voir la fiche détaillée
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

</body>
</html>