/** @type {import('tailwindcss').Config} */
export default {
	content: ['./resources/**/*.blade.php', './resources/**/*.js'],
	theme: {
		colors: {
			transparent: 'transparent',
			blue: {
				50: '#f0faff',
				100: '#e0f3fe',
				200: '#bae9fd',
				300: '#5bcefa',
				400: '#39c5f7',
				500: '#10aee7',
				600: '#038dc6',
				700: '#0470a0',
				800: '#085f84',
				900: '#0d4e6d',
				950: '#083249',
			},
			red: {
				50: '#fef2f3',
				100: '#fde6e9',
				200: '#fad1d8',
				300: '#f6abb7',
				400: '#f0778d',
				500: '#e64d6d',
				600: '#d22c56',
				700: '#b11f48',
				800: '#941d42',
				900: '#7f1c3e',
				950: '#470a1d',
			},
			green: {
				50: '#f0fdf5',
				100: '#dcfce8',
				200: '#a9f5c7',
				300: '#86efb1',
				400: '#4ade87',
				500: '#22c565',
				600: '#16a350',
				700: '#158042',
				800: '#166538',
				900: '#145330',
				950: '#052e18',
			},

			dark: '#343A40', // background dark
			white: '#FFFFFF',
		},
		extend: {},
	},
	plugins: [],
};
