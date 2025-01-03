/** @type {import('tailwindcss').Config} */

module.exports = {
  content: [
    "./footer.php",
    "./header.php",
    "./single.php",
    "./page.php",
    "./functions.php",
    "./templates/**/*.{html,js,php}",
    "./sections/**/*.{html,js,php}",
    "./snippets/**/*.{html,js,php}",
  ],
  theme: {
    extend: {
      colors: {
        main: "#000055",
        secondary: "#72FFC6",
        blck: "#131313",
        blck2: "#333333",
        gry: "#EDEFF1",
        gry2: "#616361",
        gry3: "#F8F8F8",
        gry4: "#9A9A9A",
        grn: "#12784A",

        white1: "#FFFEF9",
        white2: "#B0B0B0",

        white05: "#ffffff0d",
        white15: "#ffffff26",
        white20: "#ffffff33",
        white30: "#ffffff4d",
        white40: "#ffffff66",
        white60: "#ffffff99",
        white80: "#ffffffcc",

        black60: "#00000099",
        black70: "#000000b3",
        black90: "#000000e6",

        neutral0: "#FFF",
        neutral50: "#EEE",
        neutral100: "#E0E0E0",
        neutral200: "#BDBDBD",
        neutral300: "#9E9E9E",
        neutral400: "#828282",
        neutral500: "#757575",
        neutral600: "#525252",
        neutral700: "#313131",
        neutral800: "#282828",
        neutral900: "#181818",
        neutral1000: "#000",

        error: "#E57373",
      },
      fontSize: {
        "3.5xl": ["2rem", "40px"],
        "4.5xl": ["2.5rem", "1.2"],
        "6.5xl": ["4rem", "1.2"], // 64
        "8.5xl": ["6.25rem", "110px"], //100px
        "40": ["40px", "1.2"], 
        "56": ["56px", "1.2"], 
      },
      width: {
        15: "3.75rem",
        150: "150px",
        200: "200px",
        264: "264px",
        358: "358px",
        360: "360px",
        375: "375px",
        453: "453px",
      },
      height: {
        70: "280px",
        150: "150px",
        360: "360px",
        375: "375px",
        400: "400px",
        480: "480px",
      },
      minWidth: {
        200: "200px",
        264: "264px",
        360: "360px",
        750: "750px",
      },
      minHeight: {
        360: "360px",
        440: "440px",
        750: "750px",
      },
      maxWidth: {
        264: "264px",
        300: "300px",
        360: "360px",
        685: "685px",
        750: "750px",
        453: "453px",
        926: "926px",
      },
      maxHeight: {
        360: "360px",
        750: "750px",
      },
      margin: {
        15: "3.75rem",
        18: "4.5rem",
        21: "5.25rem",
        39: "9.75rem",
        min4: "-1rem",
         "-15": "-3.75rem",
      },
      padding: {
        15: "3.75rem",
        18: "4.5rem",
        21: "5.25rem",
        39: "9.75rem",
        min4: "-1rem",
      },
      borderRadius: {
        "2.5xl": "1.25rem",
      },
      gap: {},
      inset: {
        min36: "-36px",
        min20: "-20px",
        min80: "-80px",
      },
      letterSpacing: {
        4: "4px",
        3: "3px",
        2: "2px",
        1: "1px",
        0.5: "0.5px",
      },
      lineHeight: {
        "130%": "130%",
        "140%": "140%",
        "150%": "150%",
        "160%": "160%",
        opening: "1.875rem",
        openingm: "1.6rem",
      },
      boxShadow: {
        grating: "0px 4px 32px 0px rgba(0, 0, 0, 0.12)",
      },
      lineClamp: {
        7: "7",
      },
      typography: {
        DEFAULT: {
          css: {
            color: "#000",
            fontSize: "1rem",
            fontWeight: 300,
            p: {
              margin: "24px auto",
              fontSize: "1rem",
              fontWeight: 300,
              lineHeight: "170%",
            },
            h1: {
              fontSize: "4rem", //64px
              fontWeight: 300,
              lineHeight: "130%",
              marginTop: "20px", //88px
              marginBottom: "10px", //32px
            },
            h2: {
              fontSize: "2.5rem", //40px
              fontWeight: 300,
              lineHeight: "130%",
              marginTop: "20px", //88px
              marginBottom: "10px", //32px
            },
            h3: {
              fontSize: "1.25rem", //20px
              fontWeight: 300,
            },
            h4: {
              fontSize: "1.125rem", //18px
              fontWeight: 300,
            },
            h5: {
              fontSize: "1rem", //16px
              fontWeight: 300,
            },
          },
        },
        mobile: {
          css: {},
        },
      },
    },
    fontFamily: {
      primary: ["Inter", "sans-serif"],
      secondary: ["Inter", "sans-serif"],
    },
    screens: {
      xs: "400px",
      // => @media (min-width: 360px) { ... }

      sm: "640px",
      // => @media (min-width: 640px) { ... }

      md: "769px",
      // => @media (min-width: 768px) { ... }

      lg: "1025px",
      // => @media (min-width: 1023px) { ... }

      xl: "1280px",
      // => @media (min-width: 1280px) { ... }

      "2xl": "1536px",
      // => @media (min-width: 1536px) { ... }
    },
  },
  variants: {
    extend: {},
  },
  corePlugins: {
    outline: false,
  },
  plugins: [require("@tailwindcss/typography")],
};
