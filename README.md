# werkbank.today – backbone

The frotnend is at [werkbank.today](http://werkbank.today)
 
The backend of werkbank.today is built with [Kirby CMS](https://getkirby.com/) (v4).

The CMS panel can be accessed at [werkbank.today/panel](werkbank.today/panel)

## Running the site locally

Pull this repo and run `php -S localhost:8000 kirby/router.php`.

To pull the `/content` folder locally run this rsync command in the local project directory. Warning: this overwrites the existing content folder.

`rsync -avz --delete -e 'ssh -p 26' bh115544@h36.mijn.host:/home/bh115544/public_html/content ./content`

## Production

Gijs setup a server at Mijnhost (https://mijn.host). The backend is located on the server at `/home/bh115544/public_html`

⚠️ Never make changes directly to this server directory otherwise the deployment action will fail. This is also best practice since Git is a version control system.

The site is deployed using Github actions. The action uses ssh and and runs `git pull` on the server.

`/content` and `/media` are added to the .gitignore file and should never be committed. You can always ftp into the server to download the most recent versions of these directories or use the rsync command above.

---

Gijs de Boer <info@supergijs.com><br>
Emma Verhoeven <emmavrhv@gmail.com><br>
Elliott Cost <email@elliott.computer><br>
October 2024
