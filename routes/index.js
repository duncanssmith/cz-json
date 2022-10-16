var express = require('express')
var app = express()
var router = express.Router()
var productsFile = require("../public/database/products.json")
var cadenzasFile = require("../public/database/cadenzas.json")
var scalesFile = require("../public/database/scales.json")
var aboutFile = require("../public/database/products.json")

// console.log(strJson)

/* GET home page. */
router.get('/', function(req, res, next) {
  const products = productsFile 
  const cadenzas = cadenzasFile 
  const scales = scalesFile 
  const tableLimit = 4
  
  res.render('0_Home', { title: 'Mark Knight Cadenzas and Scales', 
  json1: products, 
  json2: cadenzas, 
  json3: scales, 
  tableLimit: tableLimit,
  home: true,
  page: 'Mark Knight Cadenzas and Scales', 
  page2: 'Cadenzas', 
  page3: 'Scales'});
});

router.get('/Cadenzas', function(req, res, next) {
  const products = productsFile 
  const cadenzas = cadenzasFile 
  res.render('0_List', { title: 'Mark Knight Cadenzas', cadenzas:true, json: cadenzas, products: products, page: 'Cadenzas' });
});

router.get('/Cadenzas/:id', function(req, res, next) {
  const products = productsFile 
  var id = req.params.id
  if (isNaN(id) || id > 4) { id = 0 }
  const item = cadenzasFile[id]
  res.render('1_Item', { title: 'Mark Knight Cadenzas', item: item, cadenzas:true, products: products, page: 'Cadenzas', index: id})
})

router.get('/Scales', function(req, res, next) {
  const scales = scalesFile 
  res.render('0_List', { title: 'Mark Knight Scales', json: scales, scales:true, page: 'Scales' })
})

router.get('/Scales/:id', function(req, res, next) {
  var id = req.params.id
  if (isNaN(id) || id > 5) { id = 0 }
  const item = scalesFile[id] 
  res.render('1_Item', { title: 'Mark Knight Scales', item: item, scales:true, page: 'Scales', index: id})
})

router.get('/Publications', function(req, res, next) {
  const products = productsFile 
  res.render('0_List', { title: 'Mark Knight All Publications, Cadenzas and Scales', publications: true, json: products, page: 'Publications' })
})

router.get('/Publications/:id', function(req, res, next) {
  var id = req.params.id
  if (isNaN(id) || id > 10) { id = 0 }
  const item = productsFile[id] 
  res.render('1_Item', { title: 'Mark Knight All Publications, Cadenzas and Scales', publications: true, item: item, page: 'Publications', index: id})
})

router.get('/About', function(req, res, next) {
  const about = aboutFile 
  res.render('3_About', { title: 'Mark Knight About', about:true, json: about, page: 'About' })
})

router.get('/Contact', function(req, res, next) {
  res.render('4_Contact', { title: 'Mark Knight Contact', contact:true, page: 'Contact' })
})

// catch 404 and forward to error handler
// router.(function(req, res, next) {
  // var err = new Error('Not Found');
  // err.status = 404;
  // next(err);
// });

// use the router and 401 anything falling through
router.get('*', function(req, res, next) {
  res.render('5_Error', {title: 'Mark Knight Cadenzas and Scales', error:true, page:'Error: Page not found'})
})

module.exports = router;
