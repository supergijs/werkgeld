# werkbank.today – backbone

The frotnend is at [werkbank.today](http://werkbank.today)
 
The backend of werkbank.today is built with [Kirby CMS](https://getkirby.com/) (v4).

The CMS panel can be accessed at [werkbank.today/panel](werkbank.today/panel)

## Development

Pull this repo and run `php -S localhost:8000 kirby/router.php`.

## Production

Gijs setup a server at Mijnhost (https://mijn.host). The backend is located on the server at `/home/bh115544/public_html`

⚠️ Never make changes directly to this server directory otherwise the deployment action will fail. This is also best practice since Git is a version control system.

The site is deployed using Github actions. The [action](https://github.com/oilstel/werkgeld/blob/main/.github/workflows/deploy.yml) uses ssh and and runs `git pull` on the server.

`/content` and `/media` are added to the .gitignore file and should never be committed. You can always ftp into the server to download the most recent versions of these directories.

---

Gijs de Boer <info@supergijs.com><br>
Elliott Cost <email@elliott.computer><br>
October 2024
