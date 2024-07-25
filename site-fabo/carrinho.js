const express = require('express');
const session = require('express-session');

const app = express();
app.use(express.json());

app.use(session({
    secret: 'secreto',
    resave: false,
    saveUninitialized: true,
    cookie: { secure: false }
}));

app.use(express.static('public'));

app.post('/add-to-cart', (req, res) => {
    const { name, price } = req.body;
    if (!req.session.cart) {
        req.session.cart = [];
    }
    req.session.cart.push({ name, price });
    res.status(200).send(req.session.cart);
});

app.get('/cart', (req, res) => {
    res.json(req.session.cart || []);
});

app.post('/checkout', (req, res) => {
    req.session.cart = [];
    res.status(200).send('Compra finalizada!');
});

const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Servidor rodando em http://localhost:${PORT}`);
});