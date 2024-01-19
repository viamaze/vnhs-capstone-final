import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/Students/**/*.php',
        './resources/views/filament/students/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
