
const mqtt = require('mqtt');

const set = {port: 1234};

const broker = new mqtt.Server(set);

broker.on('ready', ()=>{
	console.log('borker is ready');
})