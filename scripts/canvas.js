(function() {
	window.onload = function()
	{
		var myCanvas = document.getElementById('canvas');

		var ctx = canvas.getContext("2d");

		//Dimensions
		var W = 1800; 
		var H = 100;

		//Array of particles
		var particles = [];
		for (var i = 0; i < 20; i++)
		{
			//Adds 20 particles to array with random positions
			particles.push(new create_particle());

		}

		//Function to create multiple particles
		function create_particle()
		{
			//Random positioning on canvas
			this.x = Math.random()*W;
			this.y = Math.random()*H;

			//Random velocity added for each particle
			this.vx = Math.random()*20-10;
			this.vy = Math.random()*20-10;
		}

		var x = 100; 
		var y = 100;

		//Animate Particle
		function draw()
		{

			//Fill in canvas color
			ctx.fillStyle = "#262626";
			ctx.fillRect(0,0,W,H);

			//Draw particles from the array
			for (var t = 0; t < particles.length; t++)
			{

				var p = particles[t]; 

				//Grab image element by id
				var img = document.getElementById("musicNote");

				//Draw image to canvas
				ctx.drawImage(img, p.x, p.y);

				//Use velocity now
				p.x+= p.vx;
				p.y+= p.vy;

				//Prevent balls from moving out of canvas element
				if(p.x < -50)p.x = W+50;
				if(p.y < -50)p.y = H+50;
				if(p.x > W+50)p.x = -50;
				if(p.y > H+50)p.y = -50;
			}
		}

		setInterval(draw, 50);          
	}
}())