# michaeltorbert.com — 2026 Redesign

A comprehensive redesign of michaeltorbert.com, delivered as a working static
prototype (no build step — open `index.html` in a browser).

## The problem with the current site

The live site is a classic WordPress blog layout that has the most recent post
("Read this before buying from Kimi's Carpets Plus…") as the homepage headline
and `<title>`. That means the first impression of the site — and its search
snippet — is a carpet-store review, not Michael Torbert. The categories
(WordPress, Technology, Photography, Travel, Politics) and the credentials
(All in One SEO Pack, Semper Fi Web Design, *For Dummies* co-author, USMC,
WordCamp organizer) are buried in a sidebar and an About page.

## Design direction

**Personal brand first, blog second.** The homepage now leads with who Michael
is and what he built, then surfaces the blog, photography, and a hire-me path.

- **Identity**: Marine scarlet (`#A6192E`) and gold accents on warm paper
  neutrals — a quiet nod to the Corps and the "Semper Fi" brand, without
  being literal about it.
- **Typography**: Editorial serif display (Iowan/Palatino stack) over a clean
  system sans body. No webfont dependency — instant load, no FOUT.
- **Dark mode**: Honors `prefers-color-scheme`, with a persistent manual toggle.
- **Responsive**: Single CSS file, grid-based, with phone breakpoints and a
  collapsing menu.
- **SEO-minded** (it's his thing): semantic landmarks, one `h1` per page,
  descriptive titles/meta descriptions per page, fast static pages.

## Pages

| File | Purpose |
| --- | --- |
| `index.html` | Homepage: hero, credibility stats, selected work, latest posts, photography grid, about band, hire CTA |
| `blog.html` | Blog index with live client-side category filtering (WordPress / Technology / Photography / Travel / Politics / Life) |
| `post.html` | Article template: readable 720px measure, pull quotes, figures, prev/next |
| `about.html` | The bio, restructured around the USMC → AIOSEO → author/community timeline |
| `hire.html` | Replaces "Hire WordPress Developer": services list + contact form |

## Implementation notes

- All imagery is placeholder (CSS gradients + glyphs) so the prototype is
  self-contained; swap in real photography and plugin screenshots.
- Post cards reuse real post titles from the live site so the redesign can be
  evaluated against actual content.
- To take this to production, the markup maps cleanly onto a WordPress block
  theme: header/footer become template parts, post grids become Query Loop
  blocks, and the CSS variables move into `theme.json`.
