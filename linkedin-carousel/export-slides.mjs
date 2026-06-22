import { chromium } from 'playwright';
import { fileURLToPath } from 'url';
import path from 'path';
import fs from 'fs';

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const outDir = path.join(__dirname, 'slides');
const htmlPath = path.join(__dirname, 'index.html');

fs.mkdirSync(outDir, { recursive: true });

const browser = await chromium.launch();
const page = await browser.newPage({ viewport: { width: 1080, height: 1080 } });

await page.goto(`file:///${htmlPath.replace(/\\/g, '/')}`);
await page.waitForTimeout(2000);

await page.evaluate(() => {
  document.body.classList.add('screenshot-mode');
});

for (let i = 1; i <= 5; i++) {
  await page.evaluate((n) => {
    document.querySelectorAll('.slide-container').forEach((el) => {
      el.classList.toggle('active', parseInt(el.dataset.slide) === n);
    });
    const slide = document.querySelector('.slide-container.active .slide');
    if (slide) slide.style.transform = 'scale(1)';
  }, i);

  await page.waitForTimeout(500);

  const slide = page.locator('.slide-container.active .slide');
  await slide.screenshot({
    path: path.join(outDir, `slide-${i}.png`),
    type: 'png',
  });

  console.log(`✓ slide-${i}.png`);
}

await browser.close();
console.log(`\nDone! Images saved to: ${outDir}`);
