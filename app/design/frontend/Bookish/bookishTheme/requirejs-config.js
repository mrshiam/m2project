var config = {
  map: {
    '*': {
      customjs: 'Magento_Theme/js/customjs',
    }
},
    paths: {            
         'customjs': "Magento_Theme/js/customjs"
      },   
    shim: {
    'customjs': {
        deps: ['jquery']
    }
  }
} 