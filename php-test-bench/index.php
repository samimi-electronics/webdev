<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP and Javascript Testbench</title>
    <link 
        rel="stylesheet" 
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" 
        crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <style>
        *{
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    
    <div id="app" class="container-fluid">        
        <form @submit="onSubmit">
            <div class="col-lg-8 mx-auto">
                <h2 class="my-4">PHP and Javascript Testbench</h2>
                <div v-for="(form, index) in forms">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="card-title float-left">Entry {{ index + 1 }}</h3>
                            
                            <button class="btn btn-sm btn-danger" style="float:right;" v-if="forms.length > 1" @click="removeFormEntry(index)">Remove Entry</button>
                            
                            <input class="form-control mb-2" type="text" id="fname" v-model="form.fname" placeholder="Enter first name...">
                            <input class="form-control mb-2" type="text" id="lname" v-model="form.lname" placeholder="Enter last name...">
                            
                            Select a value:
                            
                            <input type="radio" :name="'radioTest-' + index" value="someVal1" v-model="form.radioVal">
                            <label :for="'radioTest-' + index">Value #1</label>
                            
                            <input type="radio" :name="'radioTest-' + index" value="someVal2" v-model="form.radioVal">
                            <label :for="'radioTest-' + index">Value #2</label><br><br>

                            <input type="file" @change="onImageSelect" :data-index="index"><br><br>
                        </div> 
                    </div>
                </div>
                <div class="mt-2 mb-5 float-right">
                    <button class="btn btn-success" @click="addFormEntry">Add form entry</button>
                    <button class="ml-2 btn btn-primary" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <script src="js/app.js"></script>
    <script 
        src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" 
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" 
        crossorigin="anonymous"></script>
</body>
</html>