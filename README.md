# Theme Protagonist

Premium Wordpress Theme development.

## Dev uses SASS so remember:

**Before starting open Terminal and navigate to the themes folder then type:**

```
grunt
```
This will start the Grunt task which converts SASS to CSS and watches for changes.

If the dependencies haven't been installed yet (on a new computer) then first need to type:

```
npm install
```
This will install the dependencies that are listed in the package.json file.

## Another Sass conversion method

**The below is another option for converting Sass using Ruby but apparently this is deprecated?**

```
sass --watch style:output
```

or to just watch the one file instead of the whole folder:

~~~~
sass --watch style.scss:output.css
~~~~

*(this automatically watches and converts the SCSS file to the output CSS file every time it is saved)*
