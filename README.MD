# Academy Ed For Good (Moodle)

## Branches
- production : academy.edforgood.org (MOODLE_403_STABLE)
- staging : dev-academy.edforgood.org (dev)

## Développement du thème

Développer le thème en local et push les modifications dans la branche dev

## Déploiement en production

**1. Récupérer les changements sur dev-academy.edforgood.org**

**2. Copier le thème de dev-academy.edforgood.org à academy.edforgood.org (en untrack)**

**3. Mettre à jour academy.edforgood.org en fetchant la branche stable de Moodle**

*OU*

**1. Fait un stash de l'état actuel de la branche MOODLE_403 sans theme/lb**
```
git add .
git restore --staged theme/lb
git stash
```

**2. Reset la branche**
```
git reset --hard origin/MOODLE_403_STABLE
```

**3. Fetch, Update la branche dev**
```
git fetch origin dev:dev
```

**4. Copy theme/lb dans MOODLE_403 puis restore les modifications avec stash**
```
git checkout dev -- theme/lb
git stash apply
git restore --staged .
```