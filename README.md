# NoCMS
> A simple CMS implementation written in NoPHP

The application will automatically create a database and the tables on startup via
onstart.php, this behavior is added via `onstart` in `wool.yaml`.

Normal routes are defined in `routes` in `wool.yaml`, API routes are defined in `json` in `wool.yaml`, static routes are defined in `static` in `wool.yaml`.

## Structure
```
NoCMS
├── Dockerfile
├── docker-compose.yml
├── .gitignore
├── requirements.txt
├── app
│   ├── viewcontrollers
│   │   └── ... # View Controllers for landing, login, scribe and etc.
│   ├── models
│   │   └── ... # User & Post Models 
│   ├── repositories
│   │   └── ... # User & Post Repositories 
│   ├── controllers
│   │   └── ... # User & Post Controllers 
│   ├── api
│   │   └── ... # Api routes
│   ├── docs
│   │   └── ... # NoPHP Documentation
│   ├── static
│   │   └── coolio.png
│   └── config
│       └── wool.yaml
└── README
```

## Routes:
- App - http://localhost:8000/
- API - http://localhost:8000/api/docs
- NoPHP Docs - http://localhost:8000/docs

## Ports:
8000 - for the application
No other ports are required to access the app

## Running the application
```bash
$ docker-compose up --build
```

## Live version 
You can find the live version at [LonkCloud Testing](http://testing.lonk.cloud/)