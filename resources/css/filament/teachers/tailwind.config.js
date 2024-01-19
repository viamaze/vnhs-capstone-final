import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/Teachers/**/*.php',
        './resources/views/filament/teachers/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
