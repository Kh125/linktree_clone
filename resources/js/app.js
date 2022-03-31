const { default: axios } = require('axios');

require('./bootstrap');


$('.user-link').click(function (e) {

    let linkId = $(this).data('link-id');
    let linkUrl = $(this).attr('href');
    axios.post('/visit/' + linkId, {
        link: linkUrl
    })
        .then(response => console.log('response : ', response))
        .catch(error => console.error('error : ', error));
});