# Documentation Cloudflare Turnstile

## Étape 1 : S'inscrire sur Cloudflare

- Rendez-vous sur : <https://www.cloudflare.com/products/turnstile/>
- Créez un compte
- Validez votre email

## Étape 2 : Accéder à Turnstile

-Connectez-vous à votre dashboard <https://dash.cloudflare.com/>

- Dans le menu de gauche, cliquez sur Turnstile
- Ou accédez directement : <https://dash.cloudflare.com/?to=/:account/turnstile>
- Cliquez sur "Add widget"
- Remplissez le formulaire

| Champ | Valeur | Explication |
| :---: | :---: | :---: |
| Site | name MonSite-AntiBot | Nom interne pour identifier le widget |
| Domain | localhost, mon-site.com | Domaines autorisés (sans http://) |
| Widget | mode Managed | Recommandé : gère automatiquement le défi |
| Action | non-interactive | Ou laissez vide pour auto |

- Cliquez sur "Create"
- Voici vos clés : 1 PRIVATE et 1 PUBLIC.

## Étape 3 : Configurer le projet avec Turnstile

- voir fichier `.env_template`
- Secret Key (Clé privée) CONFIDENTIELLE - Ne jamais exposer
