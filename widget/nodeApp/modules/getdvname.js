

const mId = {
	NULL:0,
	"'LM'":1,
	"'FM'":2,
	"'CM'":3,
	"'ISM'":4,
	"'IPM'":5,
	"'CFM'":6,
	"'PPM'":7,
	"'TM'":8,
	"'WCM'":9,
	"'CIP'":10,
	"'CSM'":11,
	"'RP'":12,
	"'SW'":13,
}

const mname = {
	1:"Labelling Machine",
	2:"Filling Machine",
	3:"Capping Machine",
	4:"Induction Sealer Machine",
	5:"Inkjet Printer Machine",
	6:"Carton Forming Machine",
	7:"Pick and Place Machine",
	8:"Tapping Machine",
	9:"Weight Checker Machine",
	10:"Carton Inkjet Printer",
	11:"Carton Strapper Machine",
	12:"Robot Palletizer",
	13:"Stretch Wrapper"
}

exports.getfullname = (dvname)=>{
	return [mId[dvname], mname[mId[dvname]]];

}