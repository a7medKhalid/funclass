import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/Teacher/**/*.php',
        './resources/views/filament/teacher/**/*.blade.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
