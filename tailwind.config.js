/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./public/icons/*.css",
      "./node_modules/flowbite/**/*.js",
      "transform: (content) => content.replace(/taos:/g, '')",
  ],
  safelist: [
      "w-64",
      "w-1/2",
      "rounded-l-lg",
      "rounded-r-lg",
      "bg-gray-200",
      "grid-cols-4",
      "grid-cols-7",
      "h-6",
      "leading-6",
      "h-9",
      "leading-9",
      "shadow-lg",
      "bg-opacity-50",
      "dark:bg-opacity-80",
      "!duration-[0ms]",
      "!delay-[0ms]",
      'html.js :where([class*="taos:"]:not(.taos-init))',
  ],

  theme: {
      container: {
          center: true,
          padding: "2rem",
        },
      extend: {
          colors: {
              Sidebar: "#001D22",
              main: "#F0F7F4",
              main2: "#263F43",
              main3: "#b5c7c2",
              main4: "#cadbd6",
              main5: "#000d0f",
              main6: "#003640",
              main7: "#fafaf0",
          },

          boxShadow: {
            best: "0px 2px 5px -1px rgba(50, 50, 93, 0.25),  0px 1px 3px -1px rgba(0, 0, 0, 0.3)",
            best4: "0px 2px 5px -1px rgba(255, 255, 255, 0.25),  0px 1px 3px -1px rgba(255, 255, 255, 0.3)",
            best2: "rgb(204, 219, 232) 3px 3px 6px 0px inset, rgba(255, 255, 255, 0.5) -3px -3px 6px 1px inset",
            best3: "rgba(0, 0, 0, 0.35) 0px -7px 9px -7px inset;",
            best4: "rgba(17, 17, 26, 0.1) 0px 4px 16px, rgba(17, 17, 26, 0.05) 0px 8px 32px;",
            best5: "rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;",
            taos: '0 1px 3px 0 rgba(0, 0, 0, 0.08), 0 1px 2px 0 rgba(0, 0, 0, 0.02)',
            md: '0 4px 6px -1px rgba(0, 0, 0, 0.08), 0 2px 4px -1px rgba(0, 0, 0, 0.02)',
            lg: '0 10px 15px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.01)',
            xl: '0 20px 25px -5px rgba(0, 0, 0, 0.08), 0 10px 10px -5px rgba(0, 0, 0, 0.01)',
            smooth: 'rgba(149, 157, 165, 0.2) 0px 8px 24px'

          },
      },
  },
  plugins: [require("flowbite/plugin"), require("preline/plugin"),],
};
