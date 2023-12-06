const path = require('path');

module.exports = {
    entry: './app/assets/js/app.js',
    mode: (process.env.NODE_ENV === 'production') ? 'production' : 'development',
    resolve: {
        extensions: ['*', '.js', '.jsx']
    },
    output: {
        filename: 'bundle.js',
        path: path.join(__dirname, 'www', 'assets'),
    },
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,
                use: [
                    "style-loader",
                    "css-loader",
                    "sass-loader",
                ],
            },
        ],
    }
};