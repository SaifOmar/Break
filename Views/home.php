<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Landing Page</title>
	<style>
		/* General Reset */
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			font-family: 'Arial', sans-serif;
			background: linear-gradient(135deg, #6a11cb, #2575fc);
			color: #fff;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
		}

		.container {
			background: rgba(255, 255, 255, 0.1);
			padding: 2rem;
			border-radius: 10px;
			box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
			backdrop-filter: blur(10px);
			text-align: center;
			max-width: 400px;
			width: 100%;
		}

		h1 {
			font-size: 2.5rem;
			margin-bottom: 1rem;
		}

		p {
			font-size: 1rem;
			margin-bottom: 2rem;
			color: #e0e0e0;
		}

		form {
			display: flex;
			flex-direction: column;
			gap: 1rem;
		}

		input[type="text"] {
			padding: 0.75rem;
			border: none;
			border-radius: 5px;
			font-size: 1rem;
			background: rgba(255, 255, 255, 0.8);
			color: #333;
			outline: none;
		}

		input[type="text"]::placeholder {
			color: #666;
		}

		button {
			padding: 0.75rem;
			border: none;
			border-radius: 5px;
			background: #2575fc;
			color: #fff;
			font-size: 1rem;
			cursor: pointer;
			transition: background 0.3s ease;
		}

		button:hover {
			background: #1b5bbf;
		}
	</style>
</head>

<body>
	<div class="container">
		<h1>Welcome!</h1>
		<?= $params['email'] ?>
		<p>Enter your email to get started.</p>
		<form method="post" action="#">
			<input type="text" name="email" placeholder="Enter your email" value="<?= $params['email'] ?? '' ?>" required>
			<button type="submit">Submit</button>
		</form>
	</div>
</body>

</html>
