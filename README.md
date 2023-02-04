# mod_extensionarticlesghsvs
Joomla site module. Collects and displays articles that have a key 'extension' in database table '#__bs3ghsvs_article'. Needs class 'ArticleHelper' of 'plg_system_bs3ghsvs'.

-----------------------------------------------------

# My personal build procedure (WSL 1, Debian, Win 10)

**@Since versions greater than v2021.11.15 Build procedure uses local repo fork of https://github.com/GHSVS-de/buildKramGhsvs**

- Prepare/adapt `./package.json`.
- `cd /mnt/z/git-kram/mod_extensionarticlesghsvs`

## node/npm updates/installation
- `npm run updateCheck` or (faster) `npm outdated`
- `npm run update` (if needed) or (faster) `npm update --save-dev`
- `npm install` (if needed)

## Build installable ZIP package
- `node build.js`
- New, installable ZIP is in `./dist` afterwards.
- All packed files for this ZIP can be seen in `./package`. **But only if you disable deletion of this folder at the end of `build.js`**.s

### For Joomla update and changelog server
- Create new release with new tag.
  - See release description in `dist/release.txt`.
- Extracts(!) of the update and changelog XML for update and changelog servers are in `./dist` as well. Copy/paste and necessary additions.
