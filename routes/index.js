var express = require('express');
var router = express.Router();
var productsFile = require("../public/database/products.json")
var cadenzasFile = require("../public/database/cadenzas.json")
var scalesFile = require("../public/database/scales.json")
var aboutFile = require("../public/database/products.json")
let now = new Date()
let strJson=now.toJSON()

// console.log(strJson)

/* GET home page. */
router.get('/', function(req, res, next) {
  const products = productsFile 
  const cadenzas = cadenzasFile 
  const scales = scalesFile 
  const tableLimit = 4
  
  res.render('0_Home', { title: 'Mark Knight Cadenzas and Scales', 
  strj: strJson,
  now: now,
  json1: products, 
  json2: cadenzas, 
  json3: scales, 
  tableLimit: tableLimit,
  page: 'Mark Knight Cadenzas and Scales', 
  page2: 'Cadenzas', 
  page3: 'Scales'});
});

router.get('/Cadenzas', function(req, res, next) {
  const products = productsFile 
  const cadenzas = cadenzasFile 
  res.render('0_List', { title: 'Mark Knight Cadenzas', json: cadenzas, products: products, page: 'Cadenzas' });
});

router.get('/Cadenzas/:id', function(req, res, next) {
  const products = productsFile 
  var id = req.params.id
  const item = cadenzasFile[id]
  res.render('1_Item', { title: 'Mark Knight Cadenzas', item: item, products: products, page: 'Cadenzas', index: id});
});

router.get('/Scales', function(req, res, next) {
  const scales = scalesFile 
  res.render('0_List', { title: 'Mark Knight Scales', json: scales, page: 'Scales' });
});

router.get('/Scales/:id', function(req, res, next) {
  var id = req.params.id
  const item = scalesFile[id] 
  res.render('1_Item', { title: 'Mark Knight Scales', item: item, page: 'Scales', index: id});
});

router.get('/Publications', function(req, res, next) {
  const products = productsFile 
  res.render('0_List', { title: 'Mark Knight All Publications', json: products, page: 'Publications' });
});

router.get('/Publications/:id', function(req, res, next) {
  var id = req.params.id
  const item = productsFile[id] 
  res.render('1_Item', { title: 'Mark Knight All Publications', item: item, page: 'Publications', index: id});
});

router.get('/About', function(req, res, next) {
  const about = aboutFile 
  res.render('3_About', { title: 'Mark Knight About', json: about, page: 'About' });
});

router.get('/Contact', function(req, res, next) {
  res.render('4_Contact', { title: 'Mark Knight Contact' });
});

module.exports = router;
