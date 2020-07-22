import { NgModule } from "@angular/core";
import { StoreModule } from "@ngrx/store";
import { EffectsModule } from "@ngrx/effects";

import { reducer } from "./news.reducer";
import { NewsEffects } from "./news.effects";
import { newsFeatureKey } from "./news.state";

@NgModule({
    declarations: [],
    imports: [
        StoreModule.forFeature(newsFeatureKey, reducer),
        EffectsModule.forFeature([NewsEffects])
    ]
})
export class NewsModule {
}
