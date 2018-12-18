<!DOCTYPE html>
<html xmlns:th="http://www.thymeleaf.org" xmlns:sec="http://www.thymeleaf.org/thymeleaf-extras-springsecurity3"
      xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>
        Hello
    </title>

</head>
<div>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content"
                    aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a class="navbar-brand" href="#"">Hardshop</a>

            <div class="collapse navbar-collapse" id="nav-content">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            Cart
                        </a>
                        <div class="dropdown-menu" aria-labelledby="Preview">
                            <a class="dropdown-item">Show cart</a>
                            <a class="dropdown-item">History</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="Preview" href="#" role="button"
                           aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu" aria-labelledby="Preview">
                            <div>
                                <a class="dropdown-item"
                                   >Add Item</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <div>
                <form class="form-inline" th:action="@{/logout}" method="post">
                    <span class="navbar-text mr-sm-2" >element</span>
                    <button class="btn btn-outline-success" type="submit" value="Sign Out">Sign Out</button>
                </form>
            </div>

        </div>
    </nav>
</div>

<body>
</body>
</html>