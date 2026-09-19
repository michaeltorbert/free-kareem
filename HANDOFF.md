# Handoff — michaeltorbert.com redesign

**Status:** Working prototype complete, pushed, PR open.
**Source PR:** https://github.com/michaeltorbert/free-kareem/pull/2
**Branch:** `claude/michaeltorbert-redesign-fjwg6t`
**Origin session:** https://claude.ai/code/session_013FuWxLh7mUJRpwPhJNq3gZ
**Handoff written:** 2026-09-19

---

## ⚠️ Read this first: the redesign is in the wrong repo

The prototype currently lives in `michaeltorbert/free-kareem`, which is an
unrelated 2008-era WordPress plugin ("Free Kareem" — a free-speech advocacy
widget for imprisoned Egyptian blogger Kareem Amer). The redesign was committed
there only because that was the repo attached to the session.

**Nothing in `redesign/` depends on that repo.** It is a self-contained static
site. Migrating = copying the `redesign/` directory into its own repo/project.
See "How to migrate" at the bottom.

---

## 1. What this project is

A ground-up redesign of **michaeltorbert.com**, the personal site of Michael
Torbert — WordPress developer, Marine Corps veteran, founder of **All in One SEO
Pack**, CEO of **Semper Fi Web Design**, co-author of *WordPress All-in-One For
Dummies*, WordCamp Raleigh host/sponsor, and WordPress Meetup organizer. Based in
the Raleigh, NC area.

Delivered as a **dependency-free static prototype**: no build step, no npm, no
webfonts. Open `redesign/index.html` in any browser.

## 2. Current state of the live site (the problem being solved)

The live site is a stock WordPress blog layout. Two structural problems:

1. **The personal brand is buried.** Credentials live in a sidebar and an About
   page; the homepage is just a reverse-chronological post feed.
2. **The newest post owns the homepage `<title>`.** At time of writing that post
   is a consumer review of a flooring company, so the site's search snippet and
   first impression are about a carpet store rather than about Michael.

## 3. What was built

```
redesign/
├── index.html                 Homepage: hero, stat band, selected work,
│                              latest posts (pinned feature card), photography
│                              grid, about band, hire CTA
├── blog.html                  Blog index + client-side category filtering
├── post.html                  Generic article template (AIOSEO release notes)
├── about.html                 Bio restructured around USMC → AIOSEO → author
├── hire.html                  Services list + contact form
├── kimis-carpets-plus.html    Dedicated SEO landing page (see §5)
├── README.md                  Design rationale + production notes
└── assets/
    ├── style.css              Single stylesheet, CSS custom properties
    └── main.js                Theme toggle, mobile menu, category filter
```

**~2,100 lines total. No external dependencies of any kind.**

## 4. Design decisions (and why)

| Decision | Rationale |
| --- | --- |
| **Personal brand first, blog second** | Fixes problem #1 above. Homepage leads with who he is and what he built. |
| **Marine scarlet `#A6192E` + gold on warm paper neutrals** | Quiet nod to the Corps and the "Semper Fi" brand without being literal (no eagle-globe-anchor clip art). |
| **Editorial serif display (Iowan/Palatino stack) over system sans body** | Gives it a publication feel. Crucially: **zero webfont requests**, so no FOUT and nothing to block render — matters for a site owned by an SEO guy. |
| **CSS custom properties for all color** | Makes dark mode a variable swap, and maps 1:1 onto WordPress `theme.json` later. |
| **Dark mode honoring `prefers-color-scheme` + manual toggle** | Toggle state persists in `localStorage` under key `mt-theme`. |
| **All imagery is CSS gradients + emoji glyphs** | Keeps the prototype self-contained and reviewable. **These are placeholders — swap for real photography.** |
| **Client-side category filter (no build)** | Filter chips match `data-cat` attributes on cards. Becomes a WP Query Loop in production. |

### Visual identity tokens

```css
--scarlet: #A6192E;      --scarlet-deep: #7E1323;
--gold:    #C99A2E;      --gold-soft:    #F3E3BD;
--bg:      #FAF8F5;      --ink:          #181512;
```

## 5. ⭐ The SEO strategy — most important context

**Mid-session the priority changed.** The initial redesign treated the Kimi's
Carpets Plus review as a liability to de-emphasize. The user then said:

> "I want to rank number one for the carpet store though"

So the strategy was inverted. **The review is a deliberate ranking asset, not an
accident.** Do not "clean this up" in a future session — it is intentional.

The approach — a **dedicated landing page** rather than letting the post title
hijack the homepage — is strictly better than the live site's current setup,
because it lets two pages rank for two different queries instead of one page
competing with itself:

- `kimis-carpets-plus.html` targets *"Kimi's Carpets Plus Fuquay Varina"*
- `index.html` independently targets *"Michael Torbert"*

**What's implemented on that page:**

- **Canonical points to `https://michaeltorbert.com/kimis-carpets-plus/`** — the
  existing live URL. Slug is unchanged, so existing rankings and backlinks carry
  over with no redirect needed. ⚠️ Do not change this slug.
- Exact-match keyword in `<title>`, meta description, `<h1>`, and FAQ subheads,
  including buyer-intent phrasing ("read this before buying").
- **JSON-LD: Article + FAQPage + BreadcrumbList**, with the business as the
  `about` LocalBusiness entity. Because this is an *independent* review rather
  than self-serving review markup, the FAQ block is rich-result eligible.
- **Internal link equity**: full-width pinned feature card at the top of the
  homepage blog section, same treatment on the blog index, plus a sitewide
  footer link — all with keyword-rich anchor text.
- Freshness signals ("kept up to date" + an FAQ confirming currency), which
  matter for review-intent queries.

### ⚠️ Legal caveat — carry this forward

The page body was written from claims already published in the original post
(a $12,000+ LVP flooring project, a last-minute two-week delay, incomplete work,
a lawyer's letter threatening suit over the review, the Facebook group block).
Everything is framed as first-hand experience and opinion.

**The business has already sent a legal threat over this review.** Michael must
personally review the copy before it goes live and confirm every statement is
something he can stand behind. Do not have an agent embellish, add new factual
claims, or strengthen the allegations beyond what he has already published.

## 6. Environment gotchas (will bite a new session)

1. **`michaeltorbert.com` returns HTTP 403 from this sandbox.** The response
   header is `x-deny-reason: host_not_allowed` — it's the environment's network
   allowlist, *not* the site blocking us or the site being down.
   `web.archive.org` is blocked too. **Workaround used: `WebSearch`**, which
   returns indexed titles, URLs, and summaries. That's how the site structure and
   real post titles were recovered. A future session wanting the live HTML needs
   an environment with a wider network policy.

2. **Playwright's bundled Chromium download fails** (`playwright install` dies on
   an unsigned `ondrej/php` apt repo). A working Chromium *is* pre-installed but
   at a version path Playwright doesn't auto-detect. Launch it explicitly:

   ```python
   p.chromium.launch(
       executable_path="/opt/pw-browsers/chromium-1194/chrome-linux/chrome",
       args=["--no-sandbox"],
   )
   ```
   (Confirm the version dir with `ls /opt/pw-browsers` — it may not be `-1194`.)

3. **Site content facts were sourced from search-result summaries, not the live
   DOM.** Post titles are real; dates, exact body copy, and the current theme's
   appearance were never directly observed. Verify before treating as truth.

## 7. Real post titles used (from the live site)

Used so the redesign can be evaluated against actual content rather than lorem
ipsum. Categories on the live site: WordPress, Technology, Photography, Travel,
Politics.

- Read this before buying from Kimi's Carpets Plus in Fuquay Varina
- All in One SEO Pack – updated
- Save 30% on All in One SEO Pack Pro Now at SemperPlugins.com
- WordPress Developer Bar (`/hard-at-work/`)
- All in One SEO Pack for WordPress Stickers
- The Budget Crisis – Making Economic Sense
- Audi in HDR
- Kodak Zi8 vs. Nikon D5000 (video comparison)
- North Carolina Snow (`/north-carolina-is-a-winter-wonderland/`)
- Bang and Olufsen
- Twitter Weekly Updates for 2009-07-13

Known pages: `/about/`, `/hire-wordpress-developer/`, `/kimis-carpets-plus/`.

## 8. Open items / suggested next steps

**Not started:**

- [ ] **Replace placeholder imagery.** Every visual is a CSS gradient. Needs a
      real portrait, AIOSEO screenshots, and photos for the photography grid.
- [ ] **Convert to a WordPress theme.** The markup maps cleanly onto a block
      theme: header/footer → template parts, post grids → Query Loop blocks,
      CSS custom properties → `theme.json`. The live site is WordPress, so this
      is the actual path to production.
- [ ] **Legal read-through of `kimis-carpets-plus.html`** (see §5 caveat).
- [ ] **Accessibility pass.** Never audited: contrast ratios on gold-on-white
      badges, focus-visible states, keyboard nav for the mobile menu and filter
      chips, `aria-pressed` on the filter chips.
- [ ] **Real content for `post.html`** — currently a plausible-but-invented
      AIOSEO release-notes article used as a template demo. **It is not a real
      post.** Do not publish as-is.
- [ ] Decide fate of the six blog cards whose copy was written to match real
      titles but whose body text is invented.

**Deliberately out of scope so far:** analytics, forms backend (the hire form
posts to `#`), comments, search, RSS, sitemap.

## 9. How to migrate to a new project

The `redesign/` directory is fully portable — no config, no lockfile, no
absolute paths, no repo coupling.

**Option A — drop into a new repo:**
```bash
# from a fresh clone of the new repo
cp -r /path/to/free-kareem/redesign/* .
git add . && git commit -m "Import michaeltorbert.com redesign prototype"
```

**Option B — use the bundle:** `michaeltorbert-redesign.tar.gz` (attached to the
handoff) contains the whole directory. `tar xzf` it anywhere and open
`index.html`.

**Option C — keep git history:** cherry-pick `dd65386` and `ee44baa` from
`claude/michaeltorbert-redesign-fjwg6t` onto the new repo.

### Paste-ready kickoff prompt for the new session

> I'm continuing a redesign of michaeltorbert.com that was started in another
> project. Read `HANDOFF.md` in full before doing anything — it covers the design
> system, the deliberate SEO strategy around the Kimi's Carpets Plus page (that
> page is intentional, do not de-emphasize it), environment gotchas, and the open
> task list. The prototype is in `redesign/`; open `redesign/index.html` to see
> the current state. Then let's pick up with: <your next task>.
