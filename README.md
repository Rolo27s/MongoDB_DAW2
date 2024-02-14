# MongoDB_DAW2
MongoDB_DAW2

[word explicacion MongoDB](https://docs.google.com/document/d/1jh9apgVV-dKu88tc7Qp9o7JdQQyoEQnIxWoil-Fdb8c/edit)

## Estudio de los logs de PHP con XAMPP

Dentro de la carpeta /opt/lampp/logs

- tail php_error_log  (Errores con PHP)
- tail acces_log   (Informacion de acceso de peticiones GET, POST, ...)
- 

## Algunos comandos utiles de MongoDB

```bash
mongod --version

sudo systemctl start mongod
sudo systemctl status mongod

mongosh
db.version()
show databases
…
exit
```

Interfaz grafica: MongoDB Compass

## Insert
```mongosh
use school
db.createCollection("students")
db.dropDatabase() #(to drop this db. Don't do that yet)
db.students.insertOne({name:"Spongebob", age:30, gpa:3.2})
db.students.find()
db.students.insertMany([{name:"Patrick", age:38, gpa:1.5}, {name:"Sandy", age:27, gpa:4.0}, {name:"Gary", age:18, gpa:2.5}])
```

## Data types
```mongosh
db.students.insertOne({
  name: "Larry",
  age: 32,
  gpa: 2.8,
  fullTime: false,
  registerDate: new Date(),
  graduationDate: null,
  courses: ["Biology", "Chemistry", "Calculus"],
  address: {
    street: "123 Fake St.",
    city: "Bikini Bottom",
    zip: 12345
  }
})
```

## Sorting and limiting
```mongosh
db.students.find().sort({name:1}) # or -1 to z to a
db.students.find().sort({gpa:1})
db.students.find().limit(1)

db.students.find().sort({gpa:-1}).limit(1)
```

## Find
```mongosh
db.students.find()

db.students.find({query}, {projection}) # Teoria

db.students.find({name: "Spongebob"})
db.students.find({gpa: 4.0})
db.students.find({fullTime: false})
db.students.find({gpa: 4.0, fullTime: true}) # Varias condiciones

db.students.find({}, {name:true}) # Para ver todos los nombres de la coleccion
db.students.find({}, {_id:false, name:true})
db.students.find({}, {_id:false, name:true, gpa:true})
```

## Update
```mongosh
db.students.updateOne(filter, update) # Teoria

db.students.updateOne({name:"Spongebob"}, {$set:{fullTime:true}})
db.students.find({name:"Spongebob"})
db.students.updateOne({_id: ObjectId('65cca1a75dc7e367a62e7808')}, {$set:{fullTime:false}})
db.students.find({_id: ObjectId('65cca1a75dc7e367a62e7808')})

db.students.updateOne({_id: ObjectId('65cca1a75dc7e367a62e7808')}, {$unset:{fullTime:""}}) # To remove a field

db.students.updateMany({}, {$set:{fullTime:false}})
db.students.updateOne({name:"Gary"}, {$unset:{fullTime:""}})
db.students.updateOne({name:"Sandy"}, {$unset:{fullTime:""}})

db.students.updateMany({fullTime:{$exists:false}}, {$set:{fullTime:true}}) # Si no existe fullTime field, lo agrega y vale true
```

## Delete
```mongosh
db.students.deleteOne({name:"Larry"})
db.students.deleteMany({fullTime:false})
db.students.deleteMany({registerDate:{$exists:false}})
```

# Comparison operators
```mongosh
db.students.find({name: {$ne:"Spongebob"}}) # $ne -> not equal
db.students.find({age:{$lt:20}}) # $lt -> less than
db.students.find({age:{$lte:27}}) # $lte -> less than equal
db.students.find({age:{$gt:27}}) # $lt -> greater than
db.students.find({age:{$gte:32}}) # $lte -> greater than equal

db.students.find({gpa: {$gte:3, $lte:4}}) # Range

db.students.find({name:{$in:["Spongebob", "Patrick", "Sandy"]}})
db.students.find({name:{$nin:["Spongebob", "Patrick", "Sandy"]}})
```

# Logical operators ($and, $not, $or, $nor). Return true or false.
```mongosh
db.students.find({$and: [{fullTime:true}, {age:{$lte:22}}]}) # Logica fulltTime AND age <= 22
db.students.find({$or: [{fullTime:true}, {age:{$lte:22}}]}) # Logica fulltTime OR age <= 22
db.students.find({$nor: [{fullTime:true}, {age:{$lte:22}}]}) # Logica fulltTime NOR age <= 22
db.students.find({age:{$not:{$gte:30}}}) # Logica age IS NOT >= 30 # Not devolvera los nulos tambien porque la logica seria la opuesta.
```

# Indexes
```mongosh
db.students.find({name: "Larry"}).explain("executionStats")
db.students.createIndex({name:1})
db.students.getIndexes()
db.students.dropIndex("name_1")
```

# Collections
```mongosh
show collections
db.createCollection("teachers", {capped:true, size:10000000, max:100}, {autoIndexId:false}) # Max size to teachers collection = 10MB (expressed in bytes). Max teachers = 100.

db.createCollection("courses")
db.courses.drop()
```
